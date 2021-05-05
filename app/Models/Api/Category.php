<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Api\CategoryRequest;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'img',
        'is_active'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
