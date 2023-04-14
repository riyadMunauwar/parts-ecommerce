<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Actions\Front\ShoppingCart;

class ChangeCartItemButton extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $qty = 1;
    public $productId;
    public $rowId;

    public function mount($productId, $qty, $rowId)
    {
        $this->productId = $productId;
        $this->qty = $qty;
        $this->rowId;
    }

    public function render()
    {
        return view('front.components.change-cart-item-button');
    }

    public function updatedQty($qty)
    {
        if($qty < 1) {
            $this->qty = 1;
        }

        $cart = new ShoppingCart();
        $response = $cart->updateQty($this->rowId, $this->qty);

        if(!$response['isError']){
            $this->emit('onCartItemQuantityChange');
            return $this->successToast($response['message']);
        }

        return $this->errorToast($response['message']);

    }

    public function incrementQty()
    {

        $cart = new ShoppingCart();
        $response = $cart->increment($this->rowId, 1);

        if(!$response['isError']){
            $this->emit('onCartItemQuantityChange');
            return $this->successToast($response['message']);
        }

        return $this->errorToast($response['message']);
    }


    public function decrementQty()
    {
        $cart = new ShoppingCart();
        $response = $cart->decrement($this->rowId, 1);

        if(!$response['isError']){
            $this->emit('onCartItemQuantityChange');
            return $this->successToast($response['message']);
        }

        return $this->errorToast($response['message']);
    }

}
