<?php 

namespace App\Actions\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class ShoppingCart {

    public function add($productId, $qty)
    {
        if($qty < 1) return $this->error('Minimum quantity is 1');

        $product = Product::find($productId);

        if(!$this->isStockAvailable($product, $qty)) return $this->error('Your selected quantity is greater than stock quantity');

        $item = $this->isAlreadyInTheCart($productId);

        if($item){

            $this->increment($item->rowId, $qty);
            return $this->success('Increase item quantity successfully');

        }else {

            Cart::add([
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->salePrice(),
                'qty' => $qty,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'thumbnail' => $product->thumbnailUrl(),
                    'discount_amount' => $product->discountAmount(),
                    'vat_amount' => $product->vatAmount(),
                    'sku' => $product->sku,
                    'width' => $product->width ?? 0,
                    'height' => $product->height ?? 0,
                    'length' => $product->length ?? 0,
                ]
            ]);

            return $this->success('Add to cart successfully');
        }
    }



    public function remove($rowId)
    {
        Cart::remove($rowId);

        return $this->success('Cart item romoved');
    }



    public function destroyAll()
    {
        Cart::destroy();

        return $this->success('All the cart item romoved');
    }



    public function update($rowId, $updateOption)
    {
        if(!Cart::get($rowId)){
            return $this->error('Invalid product');
        }

        return Cart::update($rowId, $updateOption);
    }


    public function updateQty($rowId, $qty)
    {
        if($qty < 1) return $this->error('Minimum quantity is 1');

        $item = Cart::get($rowId);

        if(!$item){
            return $this->error('Invalid product');
        }

        $product = Product::find($item->id);

        if(!$product) return $this->error('Invalid product id');

        if(!$this->isStockAvailable($product, $qty)) return $this->error('Your selected quantity is greater than stock quantity');

        if(Cart::update($rowId, $qty)){
            return $this->success('Item quantity updated');
        }

        return $this->error('Item quantity updated failed');
    }



    public function increment($rowId, $qty)
    {

        $item = Cart::get($rowId);

        if(!$item){
            return $this->error('Invalid action');
        }

        $product = Product::find($item->id);

        if(!$product) return $this->error('Invalid product id');

        $nextQty = $item->qty + (int) $qty;

        if(!$this->isStockAvailable($product, $nextQty)) return $this->error('Your selected quantity is greater than stock quantity');

        if(Cart::update($rowId, $nextQty)){
            return $this->success('Item quantity updated');
        }

        return $this->error('Item quantity updated failed');

    }



    public function decrement($rowId, $qty)
    {
        $item = Cart::get($rowId);

        if(!$item){
            return $this->error('Invalid action');
        }

        $nextQty = $item->qty - (int) $qty;

        if($nextQty <= 0){
            return $this->error('Minimum order quantity 1');
        }

        if(Cart::update($rowId, $nextQty)){
            return $this->success('Item quantity updated');
        }

        return $this->error('Item quantity updated failed');
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
        return Cart::content()->sum('weight');
    }


    public function totalDimension()
    {
        return Cart::content()->reduce(function($carry, $item){
            return $carry + (($item->options->height * $item->options->length * $item->options->width) * $item->qty);
        }, 0);
    }


    public function totalVat()
    {
        return Cart::content()->reduce(function($carry, $item){

            return $carry +  ( $item->qty * $item->options->vat_amount);

        }, 0);
    }


    public function totalDiscount()
    {
        return Cart::content()->reduce(function($carry, $item){

            return  $carry +  ( $item->qty * $item->options->discount_amount);

        }, 0);
    }


    public function showSubTotalPrice()
    {
        return Cart::subtotal();
    }


    public function subTotalPrice()
    {
        return Cart::content()->reduce(function($carry, $item){
            return $carry + ($item->price * $item->qty);
        }, 0);
    }


    public function orderTotalPrice()
    {
        return $this->subTotalPrice() +  $this->totalVat() + $this->totalShippingCost();
    }


    public function totalShippingCost()
    {
        return 0;
    }


    private function isAlreadyInTheCart($productId)
    {
        return Cart::content()->firstWhere('id', $productId);
    }


    private function isStockAvailable($product, $qty)
    {
        if($product->stock_qty >= $qty) return true;
        else return false;
    }


    private function success($message = '')
    {
        return [
            'isError' => false,
            'message' => $message,
        ];
    }


    public function error($message = '')
    {
        return [
            'isError' => true,
            'message' => $message,
        ];
    }
}