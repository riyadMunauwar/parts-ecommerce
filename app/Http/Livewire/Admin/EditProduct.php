<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Traits\WithSweetAlert;
use App\Traits\WithSweetAlertToast;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variation;
use App\Models\Vat;
use Illuminate\Support\Facades\DB;

class EditProduct extends Component
{
    use WithFileUploads;
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $is_edit_mode_on = false;

    public $meta_title;
    public $meta_tags;
    public $meta_description;
    public $name;
    public $slug;
    public $regular_price;
    public $sale_price;
    public $stock_qty;
    public $sku;
    public $weight;
    public $weight_unit;
    public $dimension_unit;
    public $height;
    public $length;
    public $width;
    public $color;
    public $color_code;
    public $compatibility;
    public $features;
    public $description;
    public $is_featured = false;
    public $is_published = true;
    public $is_premium = false;
    public $vat_id;



    public $old_thumbnail;
    public $old_gallery = [];
    public $thumbnail;
    public $product_id;
    public $gallery = [];
    public $categories = [];
    public $categoriesId = [];
    public $vats = [];

 
    protected $rules = [
        'meta_title' => ['nullable', 'string'],
        'meta_tags' => ['nullable', 'string'],
        'meta_description' => ['nullable', 'string'],
        'name' => ['required', 'string'],
        'slug' => ['required', 'string'],
        'regular_price' => ['required', 'numeric'],
        'sale_price' => ['required', 'numeric'],
        'stock_qty' => ['required', 'integer'],
        'height' => ['nullable', 'string'],
        'width' => ['nullable', 'string'],
        'length' => ['nullable', 'string'],
        'weight' => ['nullable', 'string'],
        'color' => ['nullable', 'string'],
        'color_code' => ['nullable', 'string'],
        'compatibility' => ['nullable', 'string'],
        'features' => ['nullable', 'string'],
        'description' => ['nullable', 'string'],
        'is_premium' => ['nullable', 'boolean'],
        'is_published' => ['nullable', 'boolean'],
        'is_featured' => ['nullable', 'boolean'],
        'vat_id' => ['nullable', 'integer'],
        // 'thumbnail' => ['required_without_all:old_thumbnail','string'],
        // 'gallery' => ['nullable','image'],
    ];


    protected $listeners = [
        'onProductEdit' => 'enableProductEditMode',
        'refresh' => '$refresh'
    ];

    public function mount()
    {
        $this->preparedInitData();
    }

    public function render()
    {
        return view('admin.components.edit-product');
    }


    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updateSave()
    {
        $this->validate();
       
        $product = Product::find($this->product_id);

        $product->categories()->sync($this->categoriesId);

        $product->meta_title = $this->meta_title;
        $product->meta_tags = $this->meta_tags;
        $product->meta_description = $this->meta_description;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->stock_qty = $this->stock_qty;
        $product->sku = $this->sku;
        $product->weight = $this->weight;
        $product->height = $this->height;
        $product->length = $this->length;
        $product->width = $this->width;
        $product->color = $this->color;
        $product->color_code = $this->color_code;
        $product->compatibility = $this->compatibility;
        $product->features = $this->features;
        $product->description = $this->description;
        $product->is_featured = $this->is_featured;
        $product->is_published = $this->is_published;
        $product->is_premium = $this->is_premium;
        $product->vat_id = $this->vat_id;

        if(app()->getLocale() === 'en'){
            $product->search_name = $this->name;
        }
        
        if($product && $this->thumbnail){
            $product->addMedia($this->thumbnail)->toMediaCollection('thumbnail');
        } 
        
        if($product && $this->gallery){
            foreach($this->gallery as $image){
                $product->addMedia($image)->toMediaCollection('gallery');
            }
        }   


        if($product->save())
        {
            $this->reset();
            $this->emit('onProductUpdated');
            $this->preparedInitData();
            $this->clearTinymceState();
    
            return $this->success('Updated', 'Product updated successfully');

        }

        return $this->error('Failed', 'Failed to updated');

    }


    public function removeThumbnail()
    {
        $this->thumbnail->delete();
        $this->thumbnail = null;
    }


    public function removeGallery()
    {
        foreach($this->gallery as $image)
        {
            $image->delete();
        }

        $this->gallery = [];
    }

    public function removeGalleryItem($id)
    {
        $item = $this->old_gallery->find($id);
        $item->delete();
        $this->emit('refresh');
        $this->successToast('Gallery item reomved');
        
    }


    public function cancelEditMode()
    {
        $this->reset();
        $this->is_edit_mode_on = false;
    }

    public function enableProductEditMode($id)
    {
        $this->preparedInitData();

        $product = Product::with('categories')->find($id);

        $this->categoriesId = $product->categories->pluck('id')->toArray();
        $this->product_id = $product->id;
        $this->meta_title = $product->meta_title;
        $this->meta_tags = $product->meta_tags;
        $this->meta_description = $product->meta_description;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->stock_qty = $product->stock_qty;
        $this->sku = $product->sku;
        $this->weight = $product->weight;
        $this->height = $product->height;
        $this->length = $product->length;
        $this->width = $product->width;
        $this->color = $product->color;
        $this->color_code = $product->color_code;
        $this->compatibility = $product->compatibility;
        $this->features = $product->features;
        $this->description = $product->description;
        $this->is_featured = $product->is_featured;
        $this->is_published = $product->is_published;
        $this->is_premium = $product->is_premium;
        $this->vat_id = $product->vat_id;

        $this->old_thumbnail = $product->thumbnailUrl('small');

        $this->old_gallery = $product->getMedia('gallery');

        $this->is_edit_mode_on = true;

        $this->dispatchBrowserEvent('init:tinymce');
        $this->dispatchBrowserEvent('tinymce:set:description', $product->description);
        $this->dispatchBrowserEvent('tinymce:set:features', $product->features);
        $this->dispatchBrowserEvent('tinymce:setcompatibility', $product->compatibility);
      
    }

    // Component Helper
    private function preparedInitData()
    {
        $this->categories = Category::all();
        $this->vats = Vat::all();
    }

    private function updatedProduct()
    {
        return [
            'meta_title' => $this->meta_title,
            'meta_tags' => $this->meta_tags,
            'meta_description' => $this->meta_description,
            'name' => $this->name,
            'search_name' => $this->name,
            'slug' => $this->slug,
            'sale_price' => $this->sale_price,
            'regular_price' => $this->regular_price,
            'stock_qty' => $this->stock_qty,
            'sku' => $this->sku,
            'weight' => $this->weight,
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
            'description' => $this->description,
            'compatibility' => $this->compatibility,
            'features' => $this->features,
            'color' => $this->color,
            'color_code' => $this->color_code,
            'vat_id' => $this->vat_id,
            'is_featured' => $this->is_featured,
            'is_premium' => $this->is_premium,
            'is_published' => $this->is_published,
        ];
    }


    private function clearTinymceState()
    {
        return $this->dispatchBrowserEvent('tinymce:clear');
    }

}
