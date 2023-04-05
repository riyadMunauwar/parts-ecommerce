<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Category;

class Product extends Model implements HasMedia
{

    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

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
        'features',
        'description',
        'is_premium',
        'is_featured',
        'is_published',
        'color',
        'color_code',
        'vat_id'
    ];




    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
             ->singleFile();

        $this->addMediaCollection('gallery');

    }



    public function thumbnailUrl($size)
    {
        if($this->hasMedia('thumbnail'))
        {
            return $this->getFirstMedia('thumbnail')->getUrl();
        }
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(150)
    //         ->height(150)
    //         ->format('webp');

    //     $this->addMediaConversion('small')
    //         ->width(640)
    //         ->height(640)
    //         ->format('webp');

    //     $this->addMediaConversion('medium')
    //         ->width(800)
    //         ->height(800)
    //         ->format('webp');

    //     $this->addMediaConversion('large')
    //         ->width(1200)
    //         ->height(1200)
    //         ->format('webp');
    // }


    // Relationship
    public function recommendation()
    {
        return $this->belongsToMany(Product::class, 'recommendations', 'recommended_id', 'recommended_by_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
