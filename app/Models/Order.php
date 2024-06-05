<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'country',
        'city',
        'latitude',
        'longitude',
        'total_price',
        'discount_id',
        'order_status_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }


}
