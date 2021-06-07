<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'description',
        'img',
        'is_active'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // one - parent_category
    public function parent_category()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    // list - children_category
    public function children_category()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
