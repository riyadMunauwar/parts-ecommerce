<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
