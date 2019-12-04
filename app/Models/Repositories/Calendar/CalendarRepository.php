<?php

namespace App\Models\Repositories\Calendar;

use App\Models\Repositories\Calendar\CalendarRepositoryInterface;
use App\Models\Repositories\BaseRepository;
use \Calendar;

class CalendarRepository extends BaseRepository implements CalendarRepositoryInterface {

    /**
     * Return all events in system
     * @return type
     */
    public function events($params) {
        $data = Calendar::events($params);
        
        $events = [];
        
        foreach ($data['data'] as $key => $event) {
            if ($event['executor']) {
                foreach ($event['executor'] as $key => $executor) {
                    $ev['id'] = $event['id'];
                    $ev['color'] = $executor['usercolor'];
                    $ev['start'] = $event['startdate'];
                    $ev['end'] = $event['enddate'];
                    $ev['url'] = route('event_edit', $event['id']);
                    $ev['title'] = $event['name'];
                    $ev['description'] = $event['description'];
                    
                    $ev['location'] = $event['location'];
                    
                    $ev['icon'] = $event['eventtypeicon'];
//                    $ev['resourceId'] = $key;
                    
                    $events[] = $ev;
                }
            }
        }
        
        return $events;
    }
    
    /**
     * Update event
     * @return type
     */
    public function update($params) {
        return Calendar::update($params);
    }
    
    /**
     * Create event
     * @return type
     */
    public function create($params) {
        return Calendar::create($params);
    }
    
    /**
     * Return event form data
     * @return type
     */
    public function edit($id) {
        return Calendar::edit($id);
    }
    
    /**
     * Store event data
     * @return type
     */
    public function store($data) {
        return Calendar::store($data);
    }
    
    /**
     * Change event duration
     * @return type
     */
    public function changeDuration($params) {
        return Calendar::changeDuration($params);
    }

}
