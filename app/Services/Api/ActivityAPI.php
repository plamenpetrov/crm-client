<?php

namespace App\Services\Api;

use GuzzleHttp\Client;

//use GuzzleHttp\Cookie\CookieJar;

class ActivityAPI extends BaseAPI {

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get latest user activities
     * @param type #params
     * @return type
     */
    public function show($params = null) {
        $response = $this->sendRequest(
                'GET', 
                $this->addParams('/api/v1/activity', $params),
                $params
        );

        return $this->validate($response);
    }

}
