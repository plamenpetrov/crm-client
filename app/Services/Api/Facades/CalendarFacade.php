<?php

namespace App\Services\Api\Facades;

use Illuminate\Support\Facades\Facade;

class CalendarFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'calendar';
    }

}
