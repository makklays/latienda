<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

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
}
