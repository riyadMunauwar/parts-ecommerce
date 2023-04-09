<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Traits\WithSweetAlert;

class CategoryList extends Component
{

    use WithPagination;
    use WithSweetalert;

    public $search = '';

    protected $listeners = [
        'onCategoryDelete' => 'deleteCategory',
        'onCategoryCreated' => '$refresh',
        'onCategoryUpdated' => '$refresh',
    ];

    public function render()
    {
        $query = Category::query();

        $search = $this->search;

        $query->when($this->search, function($query) use($search){
            $query->where('search_name', 'like', '%' . $search . '%')
                    ->orWhere('search_name', '%' . $search . '%');
        });

        $categories = $query->paginate(20);

        return view('admin.components.category-list', compact('categories'));
    }

  
    public function confirmDeleteCategory($id)
    {
        return $this->ifConfirmThenDispatch('onCategoryDelete', $id, 'Are you sure ?', 'This action delete this category permanently');
    }



    public function enableCategoryEditMode($id)
    {
        $this->emit('onCategoryEditMode', $id);
    }



    public function deleteCategory($id)
    {
        try{

            if(Category::destroy($id))
            {
                return $this->success('Deleted', 'Category deleted sucessfully');
            }

        }catch(\Excetpion $e)
        {
            return this->error('Failed', 'This Category has child category or product');
        }
        
    }


}
