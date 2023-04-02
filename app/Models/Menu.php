<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

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
        'category_id',
    ];
    
}
