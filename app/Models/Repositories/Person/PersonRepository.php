<?php

namespace App\Models\Repositories\Person;

use App\Models\Repositories\Person\PersonRepositoryInterface;
use App\Models\Repositories\BaseRepository;
use \Person;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface {

    /**
     * Return all persons in system
     * @return type
     */
    public function persons($params) {
        return Person::persons($params);
    }

    /**
     * Return person form data
     * @return type
     */
    public function create() {
        return Person::create();
    }

    /**
     * Return all person data
     * @return type
     */
    public function show($id) {
        return Person::show($id);
    }

    /**
     * Return person form data
     * @return type
     */
    public function edit($id) {
        return Person::edit($id);
    }

    /**
     * Update person data
     * @return type
     */
    public function update($id, $data) {
        return Person::update($id, $data);
    }

    /**
     * Store person data
     * @return type
     */
    public function store($data) {
        return Person::store($data);
    }

    /**
     * Return history changes for given contragent
     * @return type
     */
    public function history($id) {
        return Person::history($id);
    }

    /**
     * Return list of contragent by slug
     * @return type
     */
    public function search($slug) {
        $data = Person::search($slug);

        return $data['data']['data'];
    }

}
