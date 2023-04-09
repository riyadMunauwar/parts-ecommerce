<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Traits\WithSweetAlert;

class EditCategory extends Component
{

    use WithFileUploads;
    use WithSweetAlert;
    
    public $name;
    public $slug;
    public $order;
    public $parentCategoryId;
    public $description;
    public $isPublished = false;
    public $metaTitle;
    public $metaTags;
    public $metaDescription;

    public $categories = [];

    public $isEditModeOn = false;
    public $newIcon;
    public $oldIcon;
    public $categoryId;


    protected $rules = [
        'name' => ['required', 'string'],
        'slug' => ['required', 'string'],
        'order' => ['nullable'],
        'parentCategoryId' => ['nullable', 'integer'],
        'description' => ['nullable', 'string'],
        'isPublished' => ['nullable'],
    ];


    protected $listeners = [
        'onCategoryEditMode' => 'enableCategoryEditMode',
    ];


    public function render()
    {
        return view('admin.components.edit-category');
    }


    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }
    

    public function updateCategory()
    {
        $this->validate();

        $category = Category::find($this->categoryId);

        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->order = $this->order;
        $category->parent_id = $this->parentCategoryId;
        $category->description = $this->description;
        $category->is_published = $this->isPublished;
        $category->meta_title = $this->metaTitle;
        $category->meta_description = $this->metaDescription;
        $category->meta_tags = $this->metaTags;

        if(app()->getLocale() === 'en'){
            $category->search_name = $this->name;
        }

        if($this->newIcon){
            $category->addMedia($this->newIcon)->toMediaCollection('icon');
        }

        $category->save();

        $this->reset();
        $this->isEditModeOn = false;
        $this->emit('onCategoryUpdated');
        return $this->success('Updated', 'Category updated successfully');

    }


    public function enableCategoryEditMode($id)
    {
        $this->categories = Category::all();

        $category = Category::find($id);

        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->order = $category->order;
        $this->parentCategoryId = $category->parent_id;
        $this->description = $category->description;
        $this->isPublished = $category->is_published;
        $this->oldIcon = $category->icon;
        $this->categoryId = $category->id;
        $this->metaTitle = $category->meta_title;
        $this->metaDescription = $category->meta_description;
        $this->metaTags = $category->meta_tags;

        $this->isEditModeOn = true;

    }


    public function removeIcon()
    {
        $this->newIcon->delete();
        $this->newIcon = null;
    }


    public function cancelEditMode()
    {
        $this->reset();
        $this->isEditModeOn = false;
    }
}
