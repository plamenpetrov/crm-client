<?php

use App\Models\Repositories\Calendar\CalendarRepositoryInterface;
use App\Models\Repositories\User\UserRepositoryInterface;

class CalendarController extends BaseController {

    public $events;
    public $users;

    public function __construct(CalendarRepositoryInterface $events, UserRepositoryInterface $users) {
        $this->events = $events;
        $this->users = $users;
    }

    /**
     * Calendar page
     * @return type
     */
    public function index() {
        $data = $this->users->getUsers();
        
        return View::make('calendar.index')
                ->with('users', $data['data']);
    }

    /**
     * Get all events for calendar
     * @return type
     */
    public function events() {
        return response()->json($this->events->events(\Input::all()));
    }

}
