<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSweetAlert;
use App\Models\Product;

class ProductList extends Component
{

    use WithPagination;
    use WithSweetAlert;

    public $search;

    protected $listeners = [
        'onProductCreated' => '$refresh',
        'onProductUpdated' => '$refresh',
        'onProductDelete' => 'deleteProduct',
    ];


    public function render()
    {
        $products = $this->getProducts();
        return view('admin.components.product-list', compact('products'));
    }

    public function enableProductEditMode($id)
    {
        $this->emit('onProductEdit', $id);
    }


    public function openAddStockModal($id)
    {
        $this->emit('onAddStockModalShow', $id);
    }


    public function confirmDeleteProduct($id)
    {
        return $this->ifConfirmThenDispatch('onProductDelete', $id, 'Are you sure ?', 'Product will delete permanently !');
    }


    public function deleteProduct($id)
    {
        try {

            $product = Product::find($id);

            $product->categories()->detach();

            if($product->delete()){
                return $this->success('Success', 'Product deleted successfully.');
            }

        }catch(\Exception $e){
            return $this->error('Failed', 'Failed to delete product. try again');
        }

    }


    private function getProducts()
    {

        $search = $this->search;

        $query = Product::query();

        $query->when($this->search, function($query) use($search){
            $query->where('search_name', 'like', '%' . $search . '%')
            ->orWhere('search_name', $search);
        });

        return $query->latest()->paginate(25);

    }
}
