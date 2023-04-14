<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Actions\Front\ShoppingCart;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;

class Cart extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

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
        $this->items = $cart->all();
        $this->totalVat = $cart->totalVat();
        $this->totalShippingCost = $cart->totalShippingCost();
        $this->subTotalPrice = $cart->showSubTotalPrice();
        $this->orderTotalPrice = $cart->orderTotalPrice();
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
