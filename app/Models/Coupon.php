<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'name',
        'description'
    ];

    protected $fillable = [
        'name',
        'code',
        'amount',
        'start_at',
        'end_at',
        'description'
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime'
    ];


    public function scopeValid($query)
    {
        $now = Carbon::now();
        return $query->whereDate('start_at', '<=', $now)->whereDate('end_at', '>=', $now);
    }


    public function getCouponDiscount($totalPrice)
    {
        $discount = 0;

        if($this->type === 'percentage')
        {
            $discount = $totalPrice * ($this->amount / 100);
        }

        if($this->type === 'fixed')
        {
            $discount = $this->amount;
        }

        return $discount;
    }
    
}
