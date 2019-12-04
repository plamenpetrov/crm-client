<?php

namespace App\Services\Client\Facades;

use Illuminate\Support\Facades\Facade;

class UIFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'ui';
    }

}
