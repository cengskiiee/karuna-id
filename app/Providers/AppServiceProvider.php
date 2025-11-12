<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\View;



class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
        //
        Blade::componentNamespace('App\\Components\\Landing', 'Components.Landing');

        View::composer('components.landing.footer', \App\Http\ViewComposers\ContactComposer::class);
        View::composer('components.landing.header', \App\Http\ViewComposers\ContactComposer::class);



    }
}
