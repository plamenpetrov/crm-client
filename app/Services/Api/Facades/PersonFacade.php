<?php

namespace App\Services\Api\Facades;

use Illuminate\Support\Facades\Facade;

class PersonFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'person';
    }

}
