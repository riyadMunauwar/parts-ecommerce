<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;



class Category extends Component
{
    use WithFileUploads;
    
    public $name;
    public $slug;
    public $order;
    public $parentCategoryId;
    public $icon;
    public $description;
    public $isPublished;

    public function render()
    {
        return view('admin.components.category');
    }

    public function submitHandeler()
    {
        dd($this->icon);
    }
}
