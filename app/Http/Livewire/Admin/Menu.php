<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\WithSweetAlert;
use App\Models\Menu as _Menu;
use App\Models\Category;

class Menu extends Component
{
    use WithSweetAlert;

    public $locale;

    public $menus = [];
    public $categories = [];
    public $isEditModeOn = false;
    public $menuId;
    public $useLink = false;


    // Form variable
    public $name;
    public $link;
    public $order;
    public $categoryId;


    protected $rules = [
        'name' => ['required', 'string'],
        'link' => ['nullable', 'string'],
        'order' => ['nullable', 'numeric'],
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

    public function updatedLocale($localeValue)
    {
        $this->preparedInitialData($localeValue);
        $this->cancelMenuEditMode();
    }

    public function createMenu()
    {
        $this->validate();

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $menu = _Menu::create([
            'name' => $this->name,
            'link' => $this->link,
            'order' => $this->order,
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

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $menu = _Menu::find($this->menuId);

        $menu->name = $this->name;
        $menu->link = $this->link;
        $menu->order = $this->order;
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
        try {

            if(_Menu::destroy($id)) {
                $this->reset();
                $this->preparedInitialData();
                return $this->success('Deleted', 'Menu deleted successfully');
            }
        }catch(\Exception $e)
        {
            return $this->error('Failed', 'Something went wrong try again.');
        }

    }


    public function enableMenuEditMode($id)
    {
        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        $menu = _Menu::find($id);

        $this->menuId = $menu->id;
        $this->name = $menu->name;
        $this->link = $menu->link;
        $this->order = $menu->order;
        $this->categoryId = $menu->category_id;

        $this->isEditModeOn = true;

    }

    public function cancelMenuEditMode()
    {
        $locale = $this->locale;
        $this->reset();
        $this->preparedInitialData($locale);
        $this->isEditModeOn = false;
    }


    private function preparedInitialData($locale = null)
    {
        if($locale)
        {
            $this->locale = $locale;
        }
        else 
        {
            $this->locale = app()->getLocale();
        }

        $this->menus = _Menu::all();
        $this->categories = Category::where('is_published', true)->get();
    }
}
