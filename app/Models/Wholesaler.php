<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Wholesaler extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('business_licence')->singleFile();
            
        $this->addMediaCollection('sales_tax_certificate')->singleFile();;
    }

    public function businessLicenceUrl()
    {
        return $this->getFirstMediaUrl('business_licence');
    }

    public function salesTaxCertificateUrl()
    {
        return $this->getFirstMediaUrl('sales_tax_certificate');
    }

}
