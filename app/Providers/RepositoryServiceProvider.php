<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class RepositoryServiceProvider extends LaravelServiceProvider {

    public function register() {
        $this->app->bind('App\Models\Repositories\User\UserRepositoryInterface', 'App\Models\Repositories\User\UserRepository');
        $this->app->bind('App\Models\Repositories\Activity\ActivityRepositoryInterface', 'App\Models\Repositories\Activity\ActivityRepository');
        
        /**
         * Contragents repository bind
         */
        $this->app->bind('App\Models\Repositories\Contragent\ContragentRepositoryInterface', 'App\Models\Repositories\Contragent\ContragentRepository');
        
        /**
         * Persons repository bind
         */
        $this->app->bind('App\Models\Repositories\Person\PersonRepositoryInterface', 'App\Models\Repositories\Person\PersonRepository');
        
        /**
         * Calendar repository bind
         */
        $this->app->bind('App\Models\Repositories\Calendar\CalendarRepositoryInterface', 'App\Models\Repositories\Calendar\CalendarRepository');

    }

}
