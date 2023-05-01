<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Category;

class Menu extends Model
{
    use HasFactory;
    use HasTranslations;


    public $translatable = [
        'name',
    ];

    protected $fillable = [
        'name',
        'link',
        'order',
        'category_id',
    ];
    


    public function category()
    {
        return $this->belongsTo(Category::class)->orderBy('order');
    }

}
