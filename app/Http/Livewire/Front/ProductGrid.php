<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductGrid extends Component
{
    public $show = 10;
    public $sort_by = 'search_name';
    public $order_by = 'asc';
    public $categoryId;
    public $categorySlug;

    public function mount($categoryId, $categorySlug)
    {
        $this->categoryId = $categoryId;
        $this->categorySlug = $categorySlug;
    }


    public function render()
    {
        $products = $this->getProducts();
        return view('front.components.product-grid', compact('products'));
    }

    private function getProducts()
    {
        $categoryId = $this->categoryId;
 
        $query = Category::query();

        $query->when($this->categoryId, function($query) use($categoryId){
            $query->where('id', $categoryId);
        });

        $category = $query->with('products')->first();

        return $category->products()->orderBy($this->sort_by, $this->order_by)->paginate($this->show);
    }
}
