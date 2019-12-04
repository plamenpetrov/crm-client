<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use App\Services\Api\UIService;
use App\Services\Client\Export\ExportService;

class ClientServiceProvider extends LaravelServiceProvider {

    public function register() {
        $this->app->bind('ui', function() {
            return new UIService();
        });

        $this->app->bind('export', function() {
            return new ExportService();
        });
    }

}
