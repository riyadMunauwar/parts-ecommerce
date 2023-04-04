<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;



class Setting extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = [
        'top_header_message_text',
        'top_header_button_text',
        'main_header_message_text',
        'middle_header_message_text',
        'footer_column_one_title',
        'footer_column_two_title',
        'footer_column_three_title',
        'footer_column_four_title',
        'meta_title',
        'meta_description',
        'meta_tags'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();

        $this->addMediaCollection('favicon')->singleFile();

    }


    public function logoUrl()
    {
        if($this->hasMedia('logo'))
        {
            return $this->getFirstMediaUrl('logo');
        }

        return '';
    }


    public function faviconUrl()
    {
        if($this->hasMedia('favicon'))
        {
            return $this->getFirstMediaUrl('favicon');
        }

        return '';
    }

}
