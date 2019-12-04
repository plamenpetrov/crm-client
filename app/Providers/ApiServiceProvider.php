<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use App\Services\Api\LoginAPI;
use App\Services\Api\LangAPI;
use App\Services\Api\ContragentAPI;
use App\Services\Api\PersonAPI;
use App\Services\Api\ActivityAPI;
use App\Services\Api\CalendarAPI;
use App\Services\Api\UsersAPI;

//use GuzzleHttp\Cookie\CookieJar;
//use GuzzleHttp\Client as GuzzleClient;

class ApiServiceProvider extends LaravelServiceProvider {

    public function register() {
        $this->app->bind('login', function() {
            return new LoginAPI();
        });

        $this->app->bind('langapi', function() {
            return new LangAPI();
        });
        
        $this->app->bind('contragent', function() {
            return new ContragentAPI();
        });
        
        $this->app->bind('person', function() {
            return new PersonAPI();
        });
        
        $this->app->bind('activity', function() {
            return new ActivityAPI();
        });
        
        $this->app->bind('calendar', function() {
            return new CalendarAPI();
        });
        
        $this->app->bind('users', function() {
            return new UsersAPI();
        });
    }

}
