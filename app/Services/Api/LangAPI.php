<?php

namespace App\Services\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class LangAPI extends BaseAPI {

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Sending a GET request to the server in order to set the language as desired.
     * @param type $lang
     * @return type
     */
    public function setLang($lang) {
//        $guzzleRequest = new \GuzzleHttp\Psr7\Request(
//                'GET', $this->server_uri . '/api/v1/language/' . $lang
//        );

        $response = $this->sendRequest(
                'GET', 
                '/api/v1/language/' . $lang
        );
        
        $responseArray = $this->validate($response);
        
        \Session::put('translations', array_dot($responseArray['data']['translations']));
//        $response = $this->client->sendRequest('GET', $this->server_uri . '/api/v1/language/' . $lang, []);
        
        return $responseArray;
    }

    /**
     * Sends a request to the server to get all active languages
     * @return type
     */
    public function getActiveLanguages() {
        $response = $this->sendRequest('lang', 'GET');
        return $this->validate($response);
    }

}
