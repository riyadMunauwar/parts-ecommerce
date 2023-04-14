<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Actions\Front\ShoppingCart;

class AddToCartButton extends Component
{
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $qty = 1;
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function render()
    {
        return view('front.components.add-to-cart-button');
    }


    public function incrementQty()
    {
        $this->qty++;

    }

    public function decrementQty()
    {
        $this->qty--;

        if($this->qty < 1) $this->qty = 1;

    }

    public function addToCart()
    {
        $cart = new ShoppingCart();
        $response = $cart->add($this->productId, $this->qty);
        
        if(!$response['isError']){
            $this->emit('onCartItemAdded');
            return $this->success('Added', $response['message']);
        }

        return $this->error('Failed', $response['message']);

    }
}
