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
use App;

class EditProduct extends Component
{
    use WithFileUploads;
    use WithSweetAlert;
    use WithSweetAlertToast;

    public $is_edit_mode_on = false;
    public $locale;

    public $meta_title;
    public $meta_tags;
    public $meta_description;
    public $name;
    public $slug;
    public $regular_price;
    public $sale_price;
    public $wholesale_price;
    public $royal_sale_price;
    public $retailer_sale_price;
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
    public $youtube_video_url;
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
        'royal_sale_price' => ['required', 'numeric'],
        'wholesale_price' => ['required', 'numeric'],
        'retailer_sale_price' => ['required', 'numeric'],
        'stock_qty' => ['required', 'integer'],
        'height' => ['required', 'numeric'],
        'width' => ['required', 'numeric'],
        'length' => ['required', 'numeric'],
        'weight' => ['required', 'numeric'],
        'color' => ['nullable', 'string'],
        'color_code' => ['nullable', 'string'],
        'compatibility' => ['nullable', 'string'],
        'features' => ['nullable', 'string'],
        'description' => ['nullable', 'string'],
        'youtube_video_url' => ['nullable', 'string'],
        'is_premium' => ['nullable', 'boolean'],
        'is_published' => ['nullable', 'boolean'],
        'is_featured' => ['nullable', 'boolean'],
        'vat_id' => ['nullable', 'integer'],
        // 'thumbnail' => ['required_without_all:old_thumbnail','string'],
        // 'gallery' => ['nullable','image'],
    ];


    protected $listeners = [
        'onProductEdit' => 'enableProductEditMode',
        'refresh' => '$refresh',
        'onLocaleChange' => 'enableProductEditMode',
    ];

    public function mount()
    {
        $this->preparedInitData();
    }

    public function render()
    {
        return view('admin.components.edit-product');
    }


    public function updatedRegularPrice($value)
    {
        if(!$value){
            $this->regular_price = 0;
        }
    }


    public function updateSave()
    {
        $this->validate();

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

        if($this->youtube_video_url && !$this->validateYouTubeLink($this->youtube_video_url))
        {
            return $this->errorToast('Invalid youtube video link');
        }
       
        $product = Product::find($this->product_id);

        $product->categories()->sync($this->categoriesId);

        $product->meta_title = $this->meta_title;
        $product->meta_tags = $this->meta_tags;
        $product->meta_description = $this->meta_description;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->royal_sale_price = $this->royal_sale_price;
        $product->wholesale_price = $this->wholesale_price;
        $product->retailer_sale_price = $this->retailer_sale_price;
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
        $product->youtube_video_url = $this->youtube_video_url;
        $product->youtube_video_id = $this->extractYouTubeID($this->youtube_video_url);
        $product->is_featured = $this->is_featured;
        $product->is_published = $this->is_published;
        $product->is_premium = $this->is_premium;

        if($this->vat_id){
            $product->vat_id = $this->vat_id;
        }else {
            $product->vat_id = null;
        }

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

    public function enableProductEditMode($id, $locale = null)
    {
        
        if($locale)
        {
            $this->locale = $locale;
        }else {
            $this->locale = app()->getLocale();
        }

        if($this->locale)
        {
            app()->setLocale($this->locale);
        }

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
        $this->royal_sale_price = $product->royal_sale_price;
        $this->retailer_sale_price = $product->retailer_sale_price;
        $this->wholesale_price = $product->wholesale_price;
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
        $this->youtube_video_url = $product->youtube_video_url;
        $this->is_featured = $product->is_featured;
        $this->is_published = $product->is_published;
        $this->is_premium = $product->is_premium;
        $this->vat_id = $product->vat_id;

        $this->old_thumbnail = $product->thumbnailUrl('small');

        $this->old_gallery = $product->getMedia('gallery');

        $this->is_edit_mode_on = true;

        $this->dispatchBrowserEvent('tinymce:set:description', $product->description);
        $this->dispatchBrowserEvent('tinymce:set:features', $product->features);
        $this->dispatchBrowserEvent('tinymce:setcompatibility', $product->compatibility);

        $this->dispatchBrowserEvent('init:tinymce');
      
    }

    // Component Helper
    private function preparedInitData()
    {
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
        $this->vats = Vat::all();
        $this->locale = app()->getLocale();
    }

    private function validateYouTubeLink($link) {
        $regex = '/^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+$/';
        if(preg_match($regex, $link)) {
          parse_str(parse_url($link, PHP_URL_QUERY), $params);
          if(isset($params['v']) && strlen($params['v']) == 11) {
            return true;
          }
        }
        return false;
    }

    private function extractYouTubeID($link) {

        if(!$link) return null;

        $regex = '/^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+$/';

        if(preg_match($regex, $link)) {
          parse_str(parse_url($link, PHP_URL_QUERY), $params);
          if(isset($params['v']) && strlen($params['v']) == 11) {
            return $params['v'];
          }
        }

        return null;

    }


    private function clearTinymceState()
    {
        return $this->dispatchBrowserEvent('tinymce:clear');
    }

}
