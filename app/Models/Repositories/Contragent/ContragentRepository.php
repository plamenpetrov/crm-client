<?php

namespace App\Models\Repositories\Contragent;

use App\Models\Repositories\Contragent\ContragentRepositoryInterface;
use App\Models\Repositories\BaseRepository;
use \Contragent;

class ContragentRepository extends BaseRepository implements ContragentRepositoryInterface {

    /**
     * Return all contragents in system
     * @return type
     */
    public function contragents($params) {
        return Contragent::contragents($params);
    }
    
    /**
     * Return contragent form data
     * @return type
     */
    public function create() {
        return Contragent::create();
    }
    
    /**
     * Return all contragent data
     * @return type
     */
    public function show($id) {
        return Contragent::show($id);
    }
    
    /**
     * Return contragent form data
     * @return type
     */
    public function edit($id) {
        return Contragent::edit($id);
    }
    
    /**
     * Update contragent data
     * @return type
     */
    public function update($id, $data) {
        return Contragent::update($id, $data);
    }
    
    /**
     * Store contragent data
     * @return type
     */
    public function store($data) {
        return Contragent::store($data);
    }
    
    /**
     * Return history changes for given contragent
     * @return type
     */
    public function history($id) {
        return Contragent::history($id);
    }

    /**
     * Return list of contragent by slug
     * @return type
     */
    public function search($slug) {
        $data = Contragent::search($slug);
        
        return $data['data']['data'];
    }
    
    /**
     * Create new relation between contragents
     * @return type
     */
    public function storeRelation($data) {
        return Contragent::storeRelation($data);
    }
    
    /**
     * Create new relation between contragent and person
     * @return type
     */
    public function storePerson($data) {
        return Contragent::storePerson($data);
    }
    
    /**
     * Delete relation between contragents
     * @return type
     */
    public function deleteRelation($data) {
        return Contragent::deleteRelation($data);
    }
    
    /**
     * Delete relation between contragent and person
     * @return type
     */
    public function deletePerson($data) {
        return Contragent::deletePerson($data);
    }
    
}
