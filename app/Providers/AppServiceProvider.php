<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        \View::composer('*', function ($view) {
            $layouts = \Config::get('ui.layouts');
            $view->with('bootswatch', \Session::get('layoutstyle', 'cosmo'))
                    ->with('layouts', $layouts);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
