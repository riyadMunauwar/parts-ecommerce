<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Category as ProductCategory;
use App\Traits\WithSweetAlert;


class Category extends Component
{
    use WithFileUploads;
    use WithSweetAlert;
    
    public $metaTitle;
    public $metaTags;
    public $metaDescription;
    public $name;
    public $slug;
    public $order;
    public $parentCategoryId;
    public $icon;
    public $description;
    public $isPublished = false;

    public $categories = [];


    protected $rules = [
        'name' => ['required', 'string'],
        'slug' => ['required', 'string', 'unique:categories'],
        'order' => ['nullable'],
        'parentCategoryId' => ['nullable', 'integer'],
        'icon' => ['nullable'],
        'description' => ['nullable', 'string'],
        'isPublished' => ['nullable'],
    ];


    public function mount()
    {
        $this->preparedInitState();
    }

    public function render()
    {
        return view('admin.components.category');
    }


    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }


    public function removeIcon()
    {
        $this->icon->delete();
        return $this->icon = null;
    }


    public function submitHandeler()
    {
        $this->validate();

        $category = ProductCategory::create([
                    'name' => $this->name,
                    'search_name' => $this->name,
                    'slug' => $this->slug,
                    'order' => $this->order,
                    'parent_id' => $this->parentCategoryId,
                    'description' => $this->description,
                    'isPublished' => $this->isPublished,
                    'meta_title' => $this->metaTitle,
                    'meta_description' => $this->metaDescription,
                    'meta_tags' => $this->metaTags,
                ]);

        if($category) {

            if($this->icon){
                $category->addMedia($this->icon)->toMediaCollection('icon');
            }
            
            $this->reset();
            $this->categories = ProductCategory::all();
            $this->emit('onCategoryCreated');
            return $this->success('Created', 'Category created successfully');
        }

        return $this->error('Failed', 'Failed to create category. Try again');
    }

    private function preparedInitState()
    {
        $this->categories = ProductCategory::with('children')->whereNull('parent_id')->get();
    }

}
