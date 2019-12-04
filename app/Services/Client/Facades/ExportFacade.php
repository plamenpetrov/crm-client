<?php

namespace App\Services\Client\Facades;

use Illuminate\Support\Facades\Facade;

class ExportFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'export';
    }

}
