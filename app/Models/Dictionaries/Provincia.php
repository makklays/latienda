<?php
/**
 * Author: Alexander Kuziv
 * Email: alexander@makklays.com
 */

namespace App\Models\Dictionaries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'd_provincia';

    protected $fillable = [
        'name_ru',
        'name_en',
        'name_es',
    ];
}
