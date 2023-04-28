<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Actions\Front\ShoppingCart;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Models\Coupon;

class Cart extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $isCouponApplied = false;
    public $couponCode;
    public $couponDiscount = 0;
    public $items = [];
    public $totalVat = 0;
    public $totalShippingCost = 0;
    public $subTotalPrice = 0;
    public $orderTotalPrice = 0;

    protected $listeners = [
        'onCartItemQuantityChange' => '$refresh',
    ];


    public function render()
    {
        $this->preparedInitState();
        return view('front.components.cart');
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

    public function removeCartItem($rowId)
    {
        $cart = new ShoppingCart();
        
        $response = $cart->remove($rowId);

        $this->showMessage('Removed', $response);
        
    }


    public function removeAllCartItem()
    {
        $cart = new ShoppingCart();
        
        $response = $cart->destroyAll();

        $this->showMessage('Removed', $response);
    }



    private function preparedInitState()
    {

        $cart = new ShoppingCart();
        
        $cart->removePreviousCouponIfExpired();

        $this->items = $cart->all();
        // dd($this->items);
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
