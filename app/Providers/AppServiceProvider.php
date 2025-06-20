<?php

namespace App\Providers;
use App\Models\Ayar;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    // app/Providers/AppServiceProvider.php



public function boot()
{
    view()->composer('*', function ($view) {
        $view->with('genelAyar', Ayar::first());
    });
}


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   
}
