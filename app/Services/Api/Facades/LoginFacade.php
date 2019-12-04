<?php

namespace App\Services\Api\Facades;

use Illuminate\Support\Facades\Facade;

class LoginFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'login';
    }

}
