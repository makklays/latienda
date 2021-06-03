<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'd_order_status_id',
        'total_price',
        'count_products',
        'd_delivery_id',
        'd_payment_id',
        'address',
        'note'
    ];
}
