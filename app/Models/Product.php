<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;



    public function recommendation()
    {
        return $this->belongsToMany(Product::class, 'recommendations', 'recommended_id', 'recommended_by_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
