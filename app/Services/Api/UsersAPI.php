<?php

namespace App\Services\Api;

use GuzzleHttp\Client;

class UsersAPI extends BaseAPI {

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Sending a GET request to get all users
     * @return type
     */
    public function users($params = null) {
        $filters = $this->addFilters($params);
        
        $response = $this->sendRequest(
                'GET', $this->addParams('/api/v1/users', $filters)
        );

        return $this->validate($response);
    }
    
    /**
     * Filter user list if filters are passed
     * @param type $params
     * @return type
     */
    protected function addFilters($params) {
        $filters['filters']['startdate'] = date('Y-m-d');
        $filters['filters']['enddate'] = date('Y-m-d');
        
        if(isset($params['start'])) 
            $filters['filters']['startdate'] = $params['start'];
        
        if(isset($params['end'])) 
            $filters['filters']['enddate'] = $params['end'];
        
        return $filters;
    }
    
    /**
     * Sending a PATCH request to update users
     * @param type $data
     * @return type
     */
    public function update($data) {
        $response = $this->sendRequest(
                'PATCH', '/api/v1/users/update/' . $data['id'], $data
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a GET request to create user
     * @param type $params
     * @return type
     */
    public function create($params = null) {
        $uri = '/api/v1/users/create';
        
        if($params) 
            $uri = $this->addParams($uri, $params);
        
        $response = $this->sendRequest('GET', $uri);

        return $this->validate($response);
    }
    
    /**
     * Sending a POST request to store user
     * @param type $data
     * @return type
     */
    public function store($data) {
        $response = $this->sendRequest(
                'POST', '/api/v1/users/store', $this->transformEvent($data)
        );

        return $this->validate($response);
    }

}
