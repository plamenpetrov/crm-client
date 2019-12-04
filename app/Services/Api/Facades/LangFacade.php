<?php

namespace App\Services\Api\Facades;

use Illuminate\Support\Facades\Facade;

class LangFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'langapi';
    }

}
