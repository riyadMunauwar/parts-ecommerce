<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'meta_title',
        'meta_tags',
        'meta_description',
        'name',
        'content',
    ];

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_tags',
        'meta_description',
        'content',
        'is_published',
    ];
    
}
