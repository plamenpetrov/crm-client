<?php

namespace App\Services\Api;

use GuzzleHttp\Client;

class CalendarAPI extends BaseAPI {

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Sending a GET request to get all events
     * @return type
     */
    public function events($params = null) {
        $filters = $this->addFilters($params);
        
        $response = $this->sendRequest(
                'GET', $this->addParams('/api/v1/events', $filters)
        );

        return $this->validate($response);
    }
    
    protected function addFilters($params) {
        $filters['filters']['startdate'] = date('Y-m-d');
        $filters['filters']['enddate'] = date('Y-m-d');
        
        if(isset($params['start'])) 
            $filters['filters']['startdate'] = $params['start'];
        
        if(isset($params['end'])) 
            $filters['filters']['enddate'] = $params['end'];
        
        if(isset($params['executors']))
            $filters['filters']['executors'] = $params['executors'];
        
        return $filters;
    }
    
    public function update($data) {
        $response = $this->sendRequest(
                'PATCH', '/api/v1/events/update/' . $data['id'], $this->transformEvent($data)
        );

        return $this->validate($response);
    }
    
    public function create($params = null) {
        $uri = '/api/v1/events/create';
        
        if($params) 
            $uri = $this->addParams($uri, $params);
        
        $response = $this->sendRequest('GET', $uri);

        return $this->validate($response);
    }
    
    public function edit($id) {
        $response = $this->sendRequest(
                'GET', '/api/v1/events/' . $id . '/edit'
        );

        return $this->validate($response);
    }
    
    public function changeDuration($data) {
        $response = $this->sendRequest(
                'PATCH', '/api/v1/events/change/duration/' . $data['id'], $data
        );

        return $this->validate($response);
    }

    public function store($data) {
        $response = $this->sendRequest(
                'POST', '/api/v1/events/store', $this->transformEvent($data)
        );

        return $this->validate($response);
    }

    public function transformEvent($data) {
        $event['id'] = $data['id'];
        $event['eventname'] = $data['eventname'];
        $event['eventstartdate'] = $data['eventstartdate'] . ' ' . $data['eventstarttime'];
        $event['eventenddate'] = $data['eventenddate'] . ' ' . $data['eventendtime'];
        $event['eventtype'] = $data['eventtype'];
        $event['eventsubtype'] = $data['eventsubtype'];
        $event['eventdescription'] = $data['eventdescription'];
        $event['eventlocation'] = $data['eventlocation'];
        $event['eventexecutors'] = $data['eventexecutors'];
        
        return $event;
    }
}
