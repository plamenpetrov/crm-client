<?php

namespace App\Services\Api;

use GuzzleHttp\Client;

//use GuzzleHttp\Cookie\CookieJar;

class ContragentAPI extends BaseAPI {

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
    public function contragents($params = null) {
        $this->checkPage($params);
        
        $response = $this->sendRequest(
                'GET', 
                $this->addParams('/api/v1/contragents', $params),
                $params
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server to get data for contragent form like organization type, settlement etc.
     * @return type
     */
    public function create() {
        $response = $this->sendRequest(
                'GET', '/api/v1/contragents/create'
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server to show contragent data
     * @param type $id
     * @return type
     */
    public function show($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/contragents/show/' . $id
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a GET request to the server to edit contragent data
     * @param type $id
     * @return type
     */
    public function edit($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/contragents/' . $id . '/edit'
        );

        return $this->validate($response);
    }

    /**
     * Sending a PATCH request to the server in order to update data for given contragent
     * @param type $id
     * @param type $data
     * @return type
     */
    public function update($id, $data) {
        $response = $this->sendRequest(
                'PATCH', '/api/v1/contragents/update/' . $id, $data
        );

        return $this->validate($response);
    }

    /**
     * Sending a POST request to the server to store data for new contragent
     * @param type $data
     * @return type
     */
    public function store($data) {
        $response = $this->sendRequest(
                'POST', '/api/v1/contragents/store', $data
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a GET request to the server to get contragent history changes
     * @param type $id
     * @return type
     */
    public function history($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/contragents/history/' . $id
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server to search for contragent
     * @param type $slug
     * @return type
     */
    public function search($slug) {
        $response = $this->sendRequest(
                'GET', '/api/v1/contragents/search/' . $slug
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a POST request to store relation between contragents
     * @param type $data
     * @return type
     */
    public function storeRelation($data) {
        $response = $this->sendRequest(
                'POST', '/api/v1/contragents/relation/store', $data
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a POST request to store relation between contragent and person
     * @param type $data
     * @return type
     */
    public function storePerson($data) {
        $response = $this->sendRequest(
                'POST', '/api/v1/contragents/person/store', $data
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a DELETE request to delete relation between contragents
     * @param type $data
     * @return type
     */
    public function deleteRelation($data) {
        $response = $this->sendRequest(
                'DELETE', '/api/v1/contragents/relation/delete', $data
        );

        return $this->validate($response);
    }
    
    /**
     * Sending a DELETE request to delete relation between person
     * @param type $data
     * @return type
     */
    public function deletePerson($data) {
        $response = $this->sendRequest(
                'DELETE', '/api/v1/contragents/person/delete', $data
        );

        return $this->validate($response);
    }
    
}
