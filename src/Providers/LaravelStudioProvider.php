<?php

namespace GoingNext\LaravelStudio\Providers;
 
 
use Illuminate\Support\ServiceProvider;

class LaravelStudioProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'laravel_studio');

    }
}