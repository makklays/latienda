<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Word extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Word';
    }
}
