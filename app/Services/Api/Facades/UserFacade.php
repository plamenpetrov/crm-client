<?php

namespace App\Services\Api\Facades;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'users';
    }

}
