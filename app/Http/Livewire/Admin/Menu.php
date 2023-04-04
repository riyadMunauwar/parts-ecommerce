<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Models\Menu as _Menu;
use App\Models\Category;

class Menu extends Component
{
    use WithSweetAlert;

    public $menus = [];
    public $categories = [];
    public $isEditModeOn = false;
    public $menuId;
    public $useLink = false;


    // Form variable
    public $name;
    public $link;
    public $categoryId;


    protected $rules = [
        'name' => ['required', 'string'],
        'link' => ['nullable', 'string'],
        'categoryId' => ['nullable', 'integer']
    ];


    protected $listeners = [
        'onMenuDelete' => 'deleteMenuHandeler',
    ];


    public function mount()
    {
        $this->preparedInitialData();
    }

    public function render()
    {
        return view('admin.components.menu');
    }

    public function createMenu()
    {
        $this->validate();

        $menu = _Menu::create([
            'name' => $this->name,
            'link' => $this->link,
            'category_id' => $this->categoryId,
        ]);


        if($menu){

            $this->reset();

            $this->preparedInitialData();
    
            return $this->success('Created', 'Menu created successfully');
        }

        return $this->error('Failed', 'Failed to create Menu', 'Something went wrong try again');

    }


    public function updateMenu()
    {
        $this->validate();

        $menu = _Menu::find($this->menuId);

        $menu->name = $this->name;
        $menu->link = $this->link;
        $menu->category_id = $this->categoryId;

        if($menu->save()){

            $this->reset();
            $this->preparedInitialData();
            return $this->success('Updated', 'Menu updated successfully');

        }

        return $this->error('Failed', 'Failed to update. Try again');
    }



    public function confirmDeleteMenu($id)
    {
        return $this->ifConfirmThenDispatch('onMenuDelete', $id, 'Are you sure ?', 'Menu will delete permanently');
    }


    public function deleteMenuHandeler($id)
    {
        if(_Menu::destroy($id)) {
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Deleted', 'Menu deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong ! try again');

    }


    public function enableMenuEditMode($id)
    {
        $menu = _Menu::find($id);

        $this->menuId = $menu->id;
        $this->name = $menu->name;
        $this->link = $menu->link;
        $this->categoryId = $menu->category_id;

        $this->isEditModeOn = true;

    }

    public function cancelMenuEditMode()
    {
        $this->reset();
        $this->preparedInitialData();
        $this->isEditModeOn = false;
    }


    private function preparedInitialData()
    {
        $this->menus = _Menu::all();
        $this->categories = Category::where('is_published', true)->get();
    }
}
