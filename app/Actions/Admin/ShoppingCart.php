<?php 

namespace App\Actions\Admin;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart {

    private  $isError;
    private  $message;

    
    public function __construct()
    {
        $this->isError = false;
        $this->message = '';
    }


    public function add($productId, $variantId = null, $qty)
    {

    }



    public function remove($rowId)
    {
       return Cart::remove($rowId);
    }



    public function destroyAll($rowId)
    {
        return Cart::destroy();
    }



    public function update()
    {

    }



    public function increment($rowId, $qty)
    {

        $item = Cart::get($rowId);

        return Cart::update($rowId, $item->qty + (int) $qty);

    }



    public function decrement($rowId, $qty)
    {
        $item = Cart::get($rowId);

        return Cart::update($rowId, $item->qty + (int) $qty);
    }



    public function all()
    {
        return Cart::content();
    }



    public function totalItems()
    {
        return Cart::count();
    }



    public function totalWeight()
    {
        return Cart::weight();
    }



    public function totalVat()
    {

    }



    public function subTotal()
    {

    }



    public function validateItem($rowId)
    {

    }


    public function setError()
    {

    }

    // public function 

    public function error()
    {
        return [
            'isSuccess' => false,
            'isError' => true,
            'message' => $this->message,
        ];
    }
}