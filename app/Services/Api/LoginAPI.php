<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

class LoginAPI extends BaseAPI {

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Sends a login request to the login application
     * @param type $username
     * @param type $password
     * @param type $lang
     * @return type
     */
    public function login($data) {
        $loginData = $data->toArray();

        $response = $this->sendRequest(
                'POST', '/api/v1/auth/login', [
                    'email' => $loginData['username'],
                    'password' => $loginData['password']
                ]
        );

        $responseArray = $this->validate($response);
        
        if (is_array($responseArray) && isset($responseArray['data']['status']) && $responseArray['data']['status'] == 'success') {
            //success login
            Session::put('acl', $responseArray['data']['acl']);

            \UI::setNavigation($responseArray);

            Session::put('languages', $responseArray['data']['languages']);
            Session::put('language', $responseArray['data']['language']);
            Session::put('translations', array_dot($responseArray['data']['translations']));
            \Session::put('displaytype', 'list');
            
            return true;
//            }
        }

        return $responseArray;
    }

}
