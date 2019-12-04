<?php

namespace App\Services\Api\Facades;

use Illuminate\Support\Facades\Facade;

class ActivityFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'activity';
    }

}
