<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Square\Environment;
use Square\SquareClient;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\Exceptions\ApiException;
use App\Actions\Front\ShoppingCart;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Services\GoShippoHttpService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;

class SquarePaymentMethod extends Component
{

    use WithSweetAlert;
    use WithSweetAlertToast;


    public $isPaymentModeOn = false;

    public $selectedMethod;

    protected $listeners = [
        'onPaymentMode' => 'enablePaymentMode',
        'onPayment' => 'startPaymentProcess'
    ];

    public function render()
    {
        return view('front.components.square-payment-method');
    }


    public function updatedSelectedMethod($value)
    {
 
        if($value === 'card'){
            return $this->dispatchBrowserEvent('init:card');
        }

        if($value === 'google-pay'){
            $cart = new ShoppingCart();
            $orderTotal = $cart->orderTotalPrice();
            return $this->dispatchBrowserEvent('init:google-pay', [
                'orderTotal' => strval($orderTotal)
            ]);
        }

        if($value === 'apple-pay'){
            $cart = new ShoppingCart();
            $orderTotal = $cart->orderTotalPrice();
            return $this->dispatchBrowserEvent('init:apple-pay', [
                'orderTotal' => strval($orderTotal)
            ]);
        }

        if($value === 'ach'){
            return $this->dispatchBrowserEvent('init:ach');
        }

        if($value === 'gift-card'){
            return $this->dispatchBrowserEvent('init:gift-card');
        }
    }

    public function enablePaymentMode()
    {
        $this->isPaymentModeOn = true;
    }

    public function cancelPaymentMode()
    {
        $this->isPaymentModeOn = false;
    }

    public function back()
    {
        $this->selectedMethod = null;
    }




    public function startPaymentProcess($token){

        $square = new SquareClient([
            'accessToken' => config('square.access_token'),
            'environment' => Environment::SANDBOX,
        ]);

        $cart = new ShoppingCart();
        $orderTotal = $cart->orderTotalPrice();

        $money = new Money();
        $money->setAmount($orderTotal * 100);
        $money->setCurrency("USD");
        
        $request_body = new CreatePaymentRequest($token, uniqid());
        $request_body->setAmountMoney($money);
        
        try {

            $response = $square->getPaymentsApi()->createPayment($request_body);

            if(!$response->isSuccess()){
                return $this->error('Failed', 'Please try again !');
            }

            $payment_method_name = $response->getResult()->getPayment()->getSourceType();

            $result = DB::transaction(function() use($cart, $payment_method_name ){

                $customerAddress = session()->get('shipping_address');

                $address = new Address();

                $address->first_name = $customerAddress['first_name'];
                $address->last_name = $customerAddress['last_name'];
                $address->email = $customerAddress['email'];
                $address->phone = $customerAddress['phone'];
                $address->city = $customerAddress['city'];
                $address->state = $customerAddress['state'];
                $address->country = $customerAddress['country'];
                $address->street_1 = $customerAddress['street_1'];
                $address->street_2 = $customerAddress['street_2'];
                $address->zip = $customerAddress['zip'];
                $address->user_id = auth()->id();

                $address->save();


                $shipping_rate = session()->get('shipping_rate');
                $shipping_cost = (float) $shipping_rate['amount'];
                $total_product_price = $cart->subTotalPrice();

                $order = new Order();

                $order->order_date = Carbon::now();
                $order->paid_at = Carbon::now();
                $order->shipping_cost = $shipping_cost;
                $order->total_product_price = $total_product_price;
                $order->user_id = auth()->id();
                $order->total_vat = $cart->totalVat();
                $order->shippo_address_object_id = $customerAddress['shippo_address_object_id'];
                $order->order_note = $customerAddress['order_note'];
                $order->rate_object_id = $shipping_rate['object_id'];
                $order->parcel_width = $cart->averageHWL();
                $order->parcel_length = $cart->averageHWL();
                $order->parcel_height = $cart->averageHWL();
                $order->parcel_weight = $cart->totalWeight();
                $order->payment_method_name = $payment_method_name;
                $order->payment_method = 'advance';
                $order->shipper_name = $shipping_rate['provider'];
                $order->estimate_delivery_date = Carbon::now()->addDays($shipping_rate['estimated_days']);
                $order->estimate_delivery_time = $shipping_rate['estimated_days'];
                $order->status = 'Paid';

                $order->save();


                $address->order_id = $order->id;
                $address->shippo_address_object_id = $customerAddress['shippo_address_object_id'];

                $address->save();

                foreach($cart->all() as $item){

                    $orderItem = new OrderItem();
                    $orderItem->qty = $item->qty;
                    $orderItem->price = $item->price;
                    $orderItem->product_id = $item->id;
                    $orderItem->order_id = $order->id;

                    $orderItem->save();

                    Product::find($item->id)->decrement('stock_qty', $item->qty);

                }

                return [
                    'isSuccess' => true,
                    'order' => $order,
                ];

            });


            if($result['isSuccess']){

                $goShippo = new GoShippoHttpService();

                $go_shippo_response = $goShippo->createLabel(['rate' => session()->get('shipping_rate')['object_id']]);

        
                if($go_shippo_response['success']){

                    $label = $go_shippo_response['data'];

                    $order = $result['order'];

                    $order->tracking_number = $label['tracking_number'];
                    $order->lebel_url = $label['label_url'];
                    $order->tracking_url = $label['tracking_url_provider'];
                    $order->parcel_id = $label['parcel'];

                    $order->save();

                }
                    

                session()->forget('shipping_cost');
                session()->forget('shipping_rate');
                session()->forget('shipping_address');
                session()->forget('is_coupon_applied');
                session()->forget('coupon_code');

                $cart->destroyAll();

                return redirect()->route('order-confirm');
            }


        } catch (ApiException $e) {
            return $this->error('Failed', 'Something went wrong !');
        }
    }
}
