<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PageServices;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PageServices::class, function ($app) {
            return new PageServices();
        });
    }
}
