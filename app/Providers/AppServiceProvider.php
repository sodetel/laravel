<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // define a view composer
        View::composer('shared.leftnav', function($view) {

            $menu = \App\Menu::all()->map(function($item) {

                // write logic to determine if this item is active;

                $item->active = str_is($item->path . '*', '/' . request()->path());

                return $item;

            });

            $view->with('menu', $menu);

        });

        // define a shared (global) variable across the whole app
        View::share('currency', 'USD');
        View::share('dateFormat', 'D F d, Y');


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
