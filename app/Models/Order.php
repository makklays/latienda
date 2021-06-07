<?php

namespace App\Models;

use App\Models\Dictionaries\OrderStatus;
use App\Models\Dictionaries\Payment;
use App\Models\Dictionaries\Delivery;
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

    // one - order_status
    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class, 'd_order_status_id', 'id');
    }

    // one - delivery
    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'd_delivery_id', 'id');
    }

    // one - payment
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'd_payment_id', 'id');
    }

    // one - customer
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // list - order_items
    public function order_items()
    {
        return $this->belongsToMany(OrderItem::class, 'order_id', 'id');
    }
}
