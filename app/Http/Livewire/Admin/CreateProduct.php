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


class CreateProduct extends Component
{
    use WithFileUploads;
    use WithSweetAlert;
    use WithSweetAlertToast;

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
    public $youtube_video_url;
    public $description;
    public $is_featured = false;
    public $is_published = true;
    public $is_premium = false;
    public $vat_id;



    public $thumbnail;
    public $gallery = [];
    public $categories = [];
    public $categoriesId = [];
    public $vats = [];

 
    protected $rules = [
        'meta_title' => ['nullable', 'string'],
        'meta_tags' => ['nullable', 'string'],
        'meta_description' => ['nullable', 'string'],
        'name' => ['required', 'string'],
        'slug' => ['required', 'string', 'unique:products'],
        'regular_price' => ['required', 'numeric'],
        'sale_price' => ['required', 'numeric'],
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
        'is_premium' => ['nullable', 'boolean'],
        'is_published' => ['nullable', 'boolean'],
        'is_featured' => ['nullable', 'boolean'],
        'vat_id' => ['nullable', 'integer'],
        'thumbnail' => ['required','image'],
        // 'gallery' => ['nullable','image'],
    ];


    public function mount()
    {
        $this->preparedInitData();
    }

    public function render()
    {
        return view('admin.components.create-product');
    }


    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function createProduct()
    {
        $this->validate();

        if($this->youtube_video_url && !$this->validateYouTubeLink($this->youtube_video_url))
        {
            return $this->errorToast('Invalid youtube video link');
        }
       
        try{

            DB::transaction(function(){

                $product = Product::create($this->newProduct());

                if(count($this->categoriesId) > 0){
                    $product->categories()->attach($this->categoriesId);
                }

                if($this->thumbnail){
                    $product->addMedia($this->thumbnail)->toMediaCollection('thumbnail');
                }

                if($this->gallery){

                    foreach($this->gallery as $image)
                    {
                        $product->addMedia($image)->toMediaCollection('gallery');
                    }

                }

            });

            $this->reset();
            $this->preparedInitData();
            $this->clearTinymceState();
            return $this->success('Created', 'Product created successfully');

        }catch(\Exception $e){
            $this->error('Failed', 'Something went wrong !');
        }

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

    // Component Helper
    private function preparedInitData()
    {
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
        $this->vats = Vat::all();
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

    private function newProduct()
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
            'youtube_video_url' => $this->youtube_video_url,
            'youtube_video_id' => $this->extractYouTubeID($this->youtube_video_url),
            'color' => $this->color,
            'color_code' => $this->color_code,
            'vat_id' => $this->vat_id ?? null,
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
