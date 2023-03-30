<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = [
        'name',
        'description'
    ];

    protected $fillable = [
        'name',
        'slug',
        'order',
        'description',
        'is_published',
        'order_id',
        'parent_id',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')->singleFile();
    }

    public function getIconAttribute()
    {
        return $this->getFirstMediaUrl('icon');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
