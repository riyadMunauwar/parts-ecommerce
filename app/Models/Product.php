<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Category;
use App\Models\Vat;
use LaracraftTech\LaravelDateScopes\DateScopes;

class Product extends Model implements HasMedia
{

    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;
    use DateScopes;

    public $translatable = [
        'name',
        'features',
        'compatibility',
        'description',
        'meta_title',
        'meta_description',
        'meta_tags',
    ];

    protected $fillable = [
        'meta_title',
        'meta_tags',
        'meta_description',
        'search_name',
        'name',
        'slug',
        'regular_price',
        'sale_price',
        'wholesale_price',
        'royal_sale_price',
        'retailer_sale_price',
        'sku',
        'stock_qty',
        'total_review',
        'rating',
        'weight_unit',
        'dimension_unit',
        'weight',
        'height',
        'width',
        'length',
        'compatibility',
        'youtube_video_url',
        'youtube_video_id',
        'features',
        'description',
        'is_premium',
        'is_featured',
        'is_published',
        'color',
        'color_code',
        'vat_id',
    ];




    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->singleFile();
        //     ->registerMediaConversions(function (Media $media = null) {
            
        //     $this->addMediaConversion('thumb')
        //         ->width(150)
        //         ->height(150)
        //         ->format('webp')
        //         ->quality(80);

        //     $this->addMediaConversion('small')
        //         ->width(640)
        //         ->height(640)
        //         ->format('webp')
        //         ->quality(80);

        //     $this->addMediaConversion('medium')
        //         ->width(800)
        //         ->height(800)
        //         ->format('webp')
        //         ->quality(80);  
        // });

        $this->addMediaCollection('gallery');
        //     ->registerMediaConversions(function (Media $media = null) {
            
        //     $this->addMediaConversion('thumb')
        //         ->width(150)
        //         ->height(150)
        //         ->format('webp')
        //         ->quality(80);

        //     $this->addMediaConversion('small')
        //         ->width(640)
        //         ->height(640)
        //         ->format('webp')
        //         ->quality(80);

        //     $this->addMediaConversion('medium')
        //         ->width(800)
        //         ->height(800)
        //         ->format('webp')
        //         ->quality(80);  

        // });

    }


    public function thumbnailUrl($size = 'thumb')
    {
        if($this->hasMedia('thumbnail'))
        {
            return $this->getFirstMedia('thumbnail')->getUrl();
        }
    }

    public function regularPrice()
    {
        return $this->regular_price;
    }


    public function salePrice()
    {
        $salePrice = $this->sale_price;
        $discountAmount = null;
        $discountType = null;

        if(auth()->check()){

            $customer = auth()->user();

            $discountAmount = $customer->discount_amount ?? null;
            $discountType = $customer->discount_type ?? null;

        }

        if($discountAmount && $discountType && $discountType === 'percentage')
        {
            return $this->calculateSalePrice($salePrice, $discountAmount);
        }

        if($discountAmount && $discountType && $discountType === 'fixed')
        {
            return $salePrice - $discountAmount;
        }

        return $salePrice;
    }



    private function calculateDiscountAmount($actualPrice, $discountRate)
    {
        return $actualPrice * ($discountRate / 100);
    }


    private function calculateSalePrice($actualPrice, $discountRate) {
        $discountAmount = $this->calculateDiscountAmount($actualPrice, $discountRate);
        return $actualPrice - $discountAmount;
    }


    private function calculateDiscountPercentage($regularPrice, $salePrice) {

        if($regularPrice) return 0;

        $discountAmount = $regularPrice - $salePrice;
        $discountPercentage = ($discountAmount / $regularPrice) * 100;
        return $discountPercentage;
    }



    public function hasDiscount()
    {
        $discountType = null;
        $discountAmount = null;

        if(auth()->check()){

            $customer = auth()->user();

            $discountAmount = $customer->discount_amount ?? null;
            $discountType = $customer->discount_type ?? null;

        }

        if($discountType && $discountAmount)
        {
            return true;
        }

        if($this->sale_price && floatval($this->regular_price))
        {
            return true;
        }

        return false;
    }

    public function discountType()
    {
        $discountType = null;
        $discountAmount = null;

        if(auth()->check()){

            $customer = auth()->user();

            $discountAmount = $customer->discount_amount ?? null;
            $discountType = $customer->discount_type ?? null;

        }

        if($discountAmount && $discountType && $discountType === 'percentage')
        {
            return "{$discountAmount} %";
        }

        if($discountAmount && $discountType && $discountType === 'fixed')
        {
            return "{$discountAmount} $";
        }

        if($this->regular_price && $this->sale_price)
        {
            $discountPercentage = $this->calculateDiscountPercentage($this->regular_price, $this->sale_price);
            return "{$discountPercentage} %";
        }

        return 0;
    }


    public function discountAmount()
    {
        $discountType = null;
        $discountAmount = null;

        if(auth()->check()){

            $customer = auth()->user();

            $discountAmount = $customer->discount_amount ?? null;
            $discountType = $customer->discount_type ?? null;

        }

        if($discountAmount && $discountType && $discountType === 'percentage')
        {
            return $this->calculateDiscountAmount($this->sale_price, $discountAmount);
        }

        if($discountAmount && $discountType && $discountType === 'fixed')
        {
            return $discountAmount;
        }

        if($this->regular_price && $this->sale_price)
        {
            return $this->regular_price - $this->sale_price;
        }

        return 0;
    }


    public function vatAmount()
    {
        $vat = $this->vat;

        if(!$vat){
            return 0;
        }

        $salePrice =  $this->salePrice();

        $vatAmount = $salePrice * ($vat->vat_rate / 100);

        return  $vatAmount;
    }

    // Relationship

    public function recommendation()
    {
        return $this->belongsToMany(Product::class, 'recommendations', 'recommended_id', 'recommended_by_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function vat()
    {
        return $this->belongsTo(Vat::class);
    }

}
