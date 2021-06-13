<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'title',
        'slug',
        'quantity',
        'price',
    ];

    // one - order_status
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
