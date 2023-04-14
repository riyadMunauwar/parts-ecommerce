<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Product;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Actions\Front\ShoppingCart;

class SingleProduct extends Component
{

    use WithSweetAlert;
    use WithSweetAlertToast;

    public $product;
    public $category;
    public $recommendationProducts;
    public $thumbnail;

    public $qty = 1;

    public function mount($productId)
    {
        $this->product = Product::find($productId);
        $this->thumbnail = $this->product->thumbnailUrl();
        $this->category = $this->product->categories->first();
        $this->recommendationProducts = Product::inRandomOrder()->limit(5)->get();
    }

    public function render()
    {
        return view('front.components.single-product');
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
        $response = $cart->add($this->product->id, $this->qty);
        
        if(!$response['isError']){
            $this->emit('onCartItemAdded');
            return $this->success('Added', $response['message']);
        }

        return $this->error('Failed', $response['message']);

    }


    public function addToCartRecommendationItem($productId)
    {
        $cart = new ShoppingCart();
        $response = $cart->add($productId, 1);
        
        if(!$response['isError']){
            $this->emit('onCartItemAdded');
            return $this->success('Added', $response['message']);
        }

        return $this->error('Failed', $response['message']);
    }

    public function changeThumbnail($url)
    {
        $this->thumbnail = $url;
    }


}
