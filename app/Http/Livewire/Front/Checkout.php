<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Actions\Front\ShoppingCart;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Models\Coupon;

class Checkout extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

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
    public $street_no;
    public $street_1;
    public $street_2;
    public $city;
    public $state;
    public $zip;
    public $country;

    protected $listeners = [
        'onCartItemQuantityChange' => '$refresh',
    ];


    public function render()
    {
        $this->preparedInitState();
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





    private function preparedInitState()
    {

        $cart = new ShoppingCart();
        
        $cart->removePreviousCouponIfExpired();

        $this->items = $cart->totalItems();
        $this->totalVat = $cart->totalVat();
        $this->totalShippingCost = $cart->totalShippingCost();
        $this->subTotalPrice = $cart->showSubTotalPrice();
        $this->orderTotalPrice = $cart->orderTotalPrice();


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
