<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Seo', 'App\Services\Seo');
    }
}
