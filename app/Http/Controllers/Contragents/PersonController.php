<?php

use App\Models\Repositories\Person\PersonRepositoryInterface;
use Illuminate\Http\Request as Request;

class PersonController extends BaseController {

    public $persons;

    public function __construct(PersonRepositoryInterface $persons) {
        $this->persons = $persons;
    }

    /**
     * Return list of available persons
     * @return type
     */
    public function index(Request $request) {
        $data = $this->persons->persons(\Input::all());

        $paginator = $this->paginate($request, $data['data'], $data['data']['data'], []);

        return View::make('person.index')
                        ->with('persons', $data['data'])
                        ->with('paginator', $paginator)
                        ->with('pagination_config', $data['data'])
                        ->with('message', $data['message']);
    }

    /**
     * Show data for given person
     * @param type $id
     */
    public function show($id) {
        $data = $this->persons->show($id);

        return View::make('person.show')
                        ->with('person', $data['data']['person'])
                        ->with('id', $id);
    }

    /**
     * Create new person
     * @return type
     */
    public function create() {
        $data = $this->persons->create();

        return View::make('person.create')
                        ->with('person', $data['data']);
    }

    /**
     * Return person data for edit
     * @return type
     */
    public function edit($id) {
        $data = $this->persons->edit($id);

        return View::make('person.edit')
                        ->with('person', $data['data'])
                        ->with('id', $id);
    }

    /**
     * Store person
     * @return type
     */
    public function store() {
        var_dump(\Input::all());
        echo '=<br>';
        die;
        $response = $this->persons->store(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::route('persons')
                        ->with('success', $response['message']);
    }

    /**
     * Update person
     * @param type $id
     * @return type
     */
    public function update($id) {
        $response = $this->persons->update($id, \Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::route('persons')
                        ->with('success', $response['message']);
    }

    /**
     * History data for given contragent
     * @param type $id
     * @return type
     */
    public function history($id) {
        $history = $this->persons->history($id);

        return View::make('person.partials.history')
                        ->with('history', $history['data'])
                        ->with('id', $id);
//                        ->with('translations', $history['translations']);
    }

    /**
     * Search data for given person slug
     * @param Request $request
     * @return type
     */
    public function search(Request $request) {
        return response()->json($this->persons->search($request->slug));
    }

}
