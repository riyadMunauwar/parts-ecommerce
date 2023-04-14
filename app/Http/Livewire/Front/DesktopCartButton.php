<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Actions\Front\ShoppingCart;

class DesktopCartButton extends Component
{

    public $itemCount = 0;

    protected $listeners = [
        'onCartItemAdded' => '$refresh',
        'onCartItemRemoved' => '$refresh',
        'onCartItemQuantityChange' => '$refresh',
    ];


    public function render()
    {

        $cart = new ShoppingCart();
        $this->itemCount = $cart->totalItems();

        return view('front.components.desktop-cart-button');
    }

}
