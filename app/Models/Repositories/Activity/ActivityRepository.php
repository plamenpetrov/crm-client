<?php

namespace App\Models\Repositories\Activity;

use App\Models\Repositories\Activity\ActivityRepositoryInterface;
use App\Models\Repositories\BaseRepository;
use \Activity;

class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface {

    /**
     * Return all contragents in system
     * @return type
     */
    public function show($params = null) {
        return Activity::show($params);
    }
    
}
