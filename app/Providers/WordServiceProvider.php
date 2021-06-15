<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WordServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Word', 'App\Services\Word');
    }
}
