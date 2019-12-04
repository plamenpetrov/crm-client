<?php

namespace App\Models\Repositories\User;

use \App\Models\Repositories\BaseRepository;
use App\Models\Repositories\User\UserRepositoryInterface as UserRepositoryInterface;
use App\Models\User as User;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    public function __construct(User $model) {
        $this->model = $model;
        parent::__construct();
    }

    public function authenticate($data) {
        return \Login::login($data);
    }
    
    public function getUsers() {
        return \Users::users();
    }

}
