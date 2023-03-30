<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $regularPrice;
    public $salePrice;
    public $sku;
    public $weight;
    public $weightUnit;
    public $dimensionUnit;
    public $height;
    public $lenght;
    public $width;
    public $compatibility;
    public $features;
    public $description;
    public $color;
    public $colorCode;
    public $isFeatured;
    public $isPublished;
    public $isPremium;
    public $vatId;
    public $thumbnail;
    public $gallery = [];

    public $categoriesId = [];


    public function render()
    {
        return view('admin.components.create-product');
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }


}
