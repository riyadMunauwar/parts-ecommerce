<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Footer extends Model
{
    use HasFactory;
    use HasTranslations;
  

    public $translatable = [
        'menu_item_name',
    ];

    protected $fillable = [
        'column_name',
        'menu_item_name',
        'menu_item_link',
    ];
    
}
