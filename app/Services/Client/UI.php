<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Session;

class UIService {

    public function __construct() {
        
    }

    /**
     * Create navigation
     * @param type $navigation
     * @return boolean
     */
    public function setNavigation($navigationConfig) {
        $navigation = recurse($navigationConfig['data']['navigation']);
        Session::put('navigation', $navigation);
        
        return true;
    }
    
    /**
     * Translate given key
     * @param type $key
     * @return type
     */
    public function translate($key) {
        if (Session::has('translations')) {
            if(isset(Session::get('translations')[$key]))
                return Session::get('translations')[$key];
        }

        return $key;
    }

}
