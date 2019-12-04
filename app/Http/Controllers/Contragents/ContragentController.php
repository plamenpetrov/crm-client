<?php

use App\Models\Repositories\Contragent\ContragentRepositoryInterface;
use Illuminate\Http\Request as Request;

class ContragentController extends BaseController {

    public $contragents;

    public function __construct(ContragentRepositoryInterface $contragents) {
        $this->contragents = $contragents;
    }

    /**
     * Return list of available contragents
     * @return type
     */
    public function index(Request $request) {
        $data = $this->contragents->contragents(\Input::all());

        if(\Export::checkExport($request))
            return \Export::exportTo($data['data'], 'contragents');

        $paginator = $this->paginate($request, $data['meta'], $data['data'], []);

        return View::make('contragent.index')
                        ->with('contragents', $data['data'])
                        ->with('paginator', $paginator)
                        ->with('pagination_config', $data['meta']);
                        //                        ->with('translations', $data['translations'])
//                        ->with('message', $data['message']);
    }

    /**
     * Show data for given contragent
     * @param type $id
     */
    public function show($id) {
        $data = $this->contragents->show($id);

        return View::make('contragent.show')
                        ->with('contragent', $data['data']['contragent'])
                        ->with('contragents_relation_count', $data['data']['contragents_relation'])
                        ->with('contragents_relation', $this->groupContragentsByType($data['data']['contragents_relation']))
                        ->with('persons', $data['data']['persons'])
                        ->with('id', $id);
//                        ->with('translations', $data['translations']);
    }

    /**
     * Create new company
     * @return type
     */
    public function create() {
        $data = $this->contragents->create();

        return View::make('contragent.create')
                        ->with('contragent', $data['data']);
//                        ->with('translations', $data['translations']);
    }

    /**
     * Return company data for edit
     * @return type
     */
    public function edit($id) {
        $data = $this->contragents->edit($id);

        return View::make('contragent.edit')
                        ->with('contragent', $data['data'])
                        ->with('id', $id);
//                        ->with('translations', $data['translations']);
    }

    /**
     * Store company
     * @return type
     */
    public function store() {
        $response = $this->contragents->store(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::route('contragents')
                        ->with('success', $response['message']);
    }

    /**
     * Update company
     * @return type
     */
    public function update($id) {
        $response = $this->contragents->update($id, \Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::route('contragents')
                        ->with('success', $response['message']);
    }

    /**
     * History data for given contragent
     * @param type $id
     */
    public function history($id) {
        $history = $this->contragents->history($id);

        return View::make('contragent.partials.history')
                        ->with('history', $history['data'])
                        ->with('id', $id);
//                        ->with('translations', $history['translations']);
    }

    public function search(Request $request) {
        return response()->json($this->contragents->search($request->slug));
    }

    public function storeRelation(Request $request) {
        $response = $this->contragents->storeRelation(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::back()
                        ->with('success', $response['message']);
    }

    public function storePerson(Request $request) {
        $response = $this->contragents->storePerson(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::back()
                        ->with('success', $response['message']);
    }

    public function deleteRelation(Request $request) {
        $response = $this->contragents->deleteRelation(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::back()
                        ->with('success', $response['message']);
    }

    public function deletePerson(Request $request) {
        $response = $this->contragents->deletePerson(\Input::all());

        if ($response['status_code'] == 406) {
            return Redirect::back()
                            ->with('form-errors', $response['message'])
                            ->withErrors($this->addValidationErrorMsg($response))
                            ->withInput();
        }

        return Redirect::back()
                        ->with('success', $response['message']);
    }

}
