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

        $this->addMediaCollection('selling_feature_column_1_icon')->singleFile();

        $this->addMediaCollection('selling_feature_column_2_icon')->singleFile();

        $this->addMediaCollection('selling_feature_column_3_icon')->singleFile();

        $this->addMediaCollection('selling_feature_column_4_icon')->singleFile();


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

    public function sellingFeatureColumnOneIcon()
    {
        if($this->hasMedia('selling_feature_column_1_icon'))
        {
            return $this->getFirstMediaUrl('selling_feature_column_1_icon');
        }

        return '';
    }

    public function sellingFeatureColumnTwoIcon()
    {
        if($this->hasMedia('selling_feature_column_2_icon'))
        {
            return $this->getFirstMediaUrl('selling_feature_column_2_icon');
        }

        return '';
    }

    public function sellingFeatureColumnThreeIcon()
    {
        if($this->hasMedia('selling_feature_column_3_icon'))
        {
            return $this->getFirstMediaUrl('selling_feature_column_3_icon');
        }

        return '';
    }

    public function sellingFeatureColumnFourIcon()
    {
        if($this->hasMedia('selling_feature_column_4_icon'))
        {
            return $this->getFirstMediaUrl('selling_feature_column_4_icon');
        }

        return '';
    }

}
