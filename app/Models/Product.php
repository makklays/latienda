<?php
/**
 * Author: Alexander Kuziv
 * Email: alexander@makklays.com
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'category_id',
        'title',
        'slug',
        'description',
        'full_description',
        'price',
        'old_price',
        'img',
        'quantity',
        'note',
        'is_active',
    ];

    // Accessor
    public function getTitlePriceAttribute()
    {
        return "{$this->title} {$this->price}";
    }

    // Mutator
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = ucfirst($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
