<?php

use App\Models\Repositories\Calendar\CalendarRepositoryInterface;

class EventsController extends BaseController {

    public $events;

    public function __construct(CalendarRepositoryInterface $events) {
        $this->events = $events;
    }

    /**
     * Show data for given contragent
     * @param type $id
     */
    public function show($id) {
        $data = $this->events->show($id);

        return View::make('contragent.show')
                        ->with('contragent', $data['data']['contragent'])
                        ->with('events_relation_count', $data['data']['events_relation'])
                        ->with('events_relation', $this->groupContragentsByType($data['data']['events_relation']))
                        ->with('persons', $data['data']['persons'])
                        ->with('id', $id);
//                        ->with('translations', $data['translations']);
    }

    /**
     * Create new event
     * @return type
     */
    public function create($params = null) {
        $data = $this->events->create($params);

        return View::make('event.create')
                        ->with('event', $data['data']);
    }

    /**
     * Return event data for edit
     * @return type
     */
    public function edit($id) {
        $data = $this->events->edit($id);

        return View::make('event.edit')
                        ->with('event', $data['data'])
                        ->with('id', $id);
//                        ->with('translations', $data['translations']);
    }

    /**
     * Store event
     * @return type
     */
    public function store() {
        $response = $this->events->store(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::back()
                        ->with('success', $response['message']);
    }

    /**
     * Update event
     * @return type
     */
    public function update() {
        $response = $this->events->update(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::back()
                        ->with('success', $response['message']);
    }

    /**
     * Change event duration
     * @return type
     */
    public function changeDuration() {
        return $this->events->changeDuration(\Input::all());
    }

}
