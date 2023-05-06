<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Actions\Front\ShoppingCart;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Models\Coupon;
use App\Services\GoShippoHttpService;

class Checkout extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $isAddressValidated = false;
    public $isCouponApplied = false;
    public $couponCode;
    public $items = 0;
    public $couponDiscount = 0;
    public $totalVat = 0;
    public $totalShippingCost = 0;
    public $subTotalPrice = 0;
    public $orderTotalPrice = 0;


    // Shipping Address
    public $email;
    public $phone;
    public $first_name;
    public $last_name;
    public $street_1;
    public $street_2;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $order_note;

    public $shippingRates = [];
    public $addressValidationErrors = [];


    protected $rules = [
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'street_1' => ['required', 'string', 'max:255'],
        'street_2' => ['nullable', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'zip' => ['required', 'string', 'max:255'],
        'state' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'order_note' => ['nullable', 'string', 'max:1024'],
    ];

    protected $listeners = [
        'onCartItemQuantityChange' => '$refresh',
    ];

    public function mount()
    {
        $this->preparedInitState();
    }

    public function render()
    {
        return view('front.components.checkout');
    }


    public function applyCoupon()
    {
        $coupon = Coupon::valid()->where('code', $this->couponCode)->first(); 
        
        if(!$coupon) return $this->error('Invalid Coupon', '');

        session()->put('is_coupon_applied', true);
        session()->put('coupon_code', $coupon->code);

        return $this->success('Coupon Applied', '');   
    }


    public function removeCoupon()
    {
        if(session()->has('is_coupon_applied') && session()->has('coupon_code'))
        {
            session()->forget('is_coupon_applied');
            session()->forget('coupon_code');
            $this->couponCode = null;
            $this->isCouponApplied = false;
            $this->preparedInitState();
            return $this->success('Removed', '');
        }
    }

    public function goToCart()
    {
        return redirect()->route('cart');
    }


    // Checkout Handeler

    public function validateAddress(GoShippoHttpService $shippo)
    {
        $this->validate();


        $this->shippingRates = [];
        $this->addressValidationErrors = [];
        
        try {

            $response = $shippo->createAddress([
                'name' => $this->first_name . ' ' . $this->last_name,
                'company' => '',
                'street1' => $this->street_1,
                'street2' => $this->street_1,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
                'country' => $this->country,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);

            if(!$response['success']){
                return $this->error('Failed', 'Something went wrong !');
            }
            
            if(!$response['data']['validation_results']['is_valid']){

                $this->addressValidationErrors = $response['data']['validation_results']['messages'];

                return $this->error('Address Validation Failed', '');

            }


            $address = $response['data'];

            $this->street_1 = $address['street1'];
            $this->street_2 = $address['street2'];
            $this->city = $address['city'];
            $this->zip = $address['zip'];
            $this->state = $address['state'];
            $this->country = $address['country'];
            $this->phone = $address['phone'];
            $this->email = $address['email'];

            $shippingAddress = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'street_1' => $this->street_1,
                'street_2' => $this->street_2, 
                'city' => $this->city,
                'zip' => $this->zip,
                'state' => $this->state,
                'country' => $this->country,
                'shippo_address_object_id' => $address['object_id'],
            ]; 

            if(session()->has('shipping_address')){
                session()->forget('shipping_address');
            }

            session()->put('shipping_address', $shippingAddress);
            
            $cart = new ShoppingCart();

            $pickup_address_object_id = config('setting.shippo_address_object_id') ?? false;

            if(!$pickup_address_object_id) {
                return $this->error('Failed', 'Admin not setup pickup address');
            }

            $parcel = [
                'height' => $cart->averageHWL(),
                'width' => $cart->averageHWL(),
                'length' => $cart->averageHWL(),
                'weight' => $cart->totalWeight(),
            ];


            $addresses = [
                'address_from' => $pickup_address_object_id,
                'address_to' => session()->get('shipping_address')['shippo_address_object_id'],
            ];


            $response = $shippo->createShipmentAndGetRates($parcel, $addresses);

            if(!$response['success'] && $response['data']['status'] !== 'SUCCESS' && !count($response['data']['rates'])){
                $this->$addressValidationErrors = $response['messages'];
                return $this->error('Shipping Rates Found Failed', '');
            }

            $this->shippingRates = $response['data']['rates'];

            session()->put('shipping_rates', $response['data']['rates']);


            return $this->success('Address validation success', '');



        }catch(\Exception $e){
            return $this->error('Unexpected Errors Occured', $e->getMessage());
        }


    }




    private function preparedInitState()
    {

        $cart = new ShoppingCart();

        $cart->removePreviousCouponIfExpired();

        $this->items = $cart->totalItems();
        $this->totalVat = $cart->totalVat();
        $this->totalShippingCost = $cart->totalShippingCost();
        $this->subTotalPrice = $cart->showSubTotalPrice();
        $this->orderTotalPrice = $cart->orderTotalPrice();

        if(session()->has('shipping_address')){

            $shippingAddress = session()->get('shipping_address');


            $this->first_name = $shippingAddress['first_name'];
            $this->last_name = $shippingAddress['last_name'];
            $this->street_1 = $shippingAddress['street_1'];
            $this->street_2 = $shippingAddress['street_2'];
            $this->city = $shippingAddress['city'];
            $this->zip = $shippingAddress['zip'];
            $this->state = $shippingAddress['state'];
            $this->country = $shippingAddress['country'];
            $this->phone = $shippingAddress['phone'];
            $this->email = $shippingAddress['email'];


        }

        if(session()->has('shipping_rates')){

            $this->shippingRates = session()->get('shipping_rates');

            $this->isAddressValidated = true;
        }


        if(session()->has('is_coupon_applied') && session()->has('coupon_code'))
        {
            $this->isCouponApplied = session()->get('is_coupon_applied');
            $this->couponCode = session()->get('coupon_code');
        }

        if($this->couponCode)
        {
            $this->couponDiscount = $cart->totalCouponDiscount();
        }
        
    }



    private function showMessage($title = '', $response)
    {
        if(!$response['isError'])
        {
            $this->preparedInitState();
            $this->emit('onCartItemQuantityChange');
            return $this->success($title, $response['message']);
        }

        return $this->error('Failed', $response['message']);
    }

}
