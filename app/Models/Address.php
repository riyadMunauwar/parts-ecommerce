<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class Address extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'state', 
        'city',
        'zip',
        'street_1',
        'street_2',
        'user_id',
        'order_id',
    ];



    // Dynamic Attribute
    public function getFullNameAttribute()
    {
        return ucwords(trim($this->first_name)) . ' ' . ucwords(trim($this->last_name)); 
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function order()
    {
       return $this->belongsTo(Order::class);
    }

}
