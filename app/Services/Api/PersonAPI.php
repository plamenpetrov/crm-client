<?php

namespace App\Services\Api;

use GuzzleHttp\Client;

class PersonAPI extends BaseAPI {

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Sending a GET request to the server in order to get persons list
     * @param type $params
     * @return type
     */
    public function persons($params = null) {
        $this->checkPage($params);

        $response = $this->sendRequest(
                'GET', $this->addParams('/api/v1/persons', $params)
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server in order to get persons form data
     * @return type
     */
    public function create() {
        $response = $this->sendRequest(
                'GET', '/api/v1/persons/create'
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server in order to show persons data
     * @param type $id
     * @return type
     */
    public function show($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/persons/show/' . $id
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server in order to get persons edit form data
     * @param type $id
     * @return type
     */
    public function edit($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/persons/' . $id . '/edit'
        );

        return $this->validate($response);
    }

    /**
     * Sending a PATCH request to the server in order to update persons data
     * @param type $id
     * @param type $data
     * @return type
     */
    public function update($id, $data) {
        $response = $this->sendRequest(
                'PATCH', '/api/v1/persons/update/' . $id, $data
        );

        return $this->validate($response);
    }

    /**
     * Sending a POST request to the server in order to store persons data
     * @param type $data
     * @return type
     */
    public function store($data) {
        $response = $this->sendRequest(
                'POST', '/api/v1/persons/store', $data
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server in order to get persons changes
     * @param type $id
     * @return type
     */
    public function history($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/persons/history/' . $id
        );

        return $this->validate($response);
    }

    /**
     * Sending a GET request to the server in order to search persons data
     * @param type $slug
     * @return type
     */
    public function search($slug) {
        $response = $this->sendRequest(
                'GET', '/api/v1/persons/search/' . $slug
        );

        return $this->validate($response);
    }

}
