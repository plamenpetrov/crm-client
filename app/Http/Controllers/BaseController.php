<?php

//namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator as LengthAwarePaginator;

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function __construct() {
//        $this->beforeFilter(function() {
//            start_measure('controller', 'Controller running');
//        });
//        $this->afterFilter(function() {
//            stop_measure('controller');
//        });
    }

    /**
     * Paginate given array of data.
     * @param type $request
     * @param type $pagination_config
     * @param type $data
     * @param type $routeParams
     * @return LengthAwarePaginator
     */
    public function paginate($request, $pagination_config, $data, $routeParams) {
        $currentPage = $request->input('page', 1);
        
        $options = [
//            'allsearch' => $request->input('allsearch', ''),
            'filters' => $request->input('filters', []),
            'sort' => $request->input('sort', 'asc'),
            'sortby' => $request->input('sortby', ''),
            'sortReverse' => $request->input('sort', 'asc') == 'asc' ? 'desc' : 'asc',
            'per_page_options' => \Config::get('ui.per_page_options'),
            'per_page' => $request->input('per_page', \Config::get('ui.per_page')),
            'current_page' => $currentPage
        ];
        
        $paginator = new LengthAwarePaginator($data, $pagination_config['total'], $pagination_config['per_page'], $currentPage, $options);
        $currentUri = \URL::route(\Request::route()->getName(), $routeParams);
        $paginator->setPath($currentUri);

        return $paginator;
    }

    /**
     * Add validation error message
     * @param type $response
     * @return type
     */
    public function addValidationErrorMsg($response) {
        $validator = Validator::make([], []);
        $messages = $validator->errors();

        foreach ($response['message'] as $element => $message) {
            $messages->add($element, $message['0']);
        }
        
        return $messages;
    }
    
    /**
     * Transform array with contragents grouped by type
     * @param type $contragentRelations
     * @return type
     */
    public function groupContragentsByType($contragentRelations) {
        if(!$contragentRelations)
            return $contragentRelations;
        
        $result = [];
        
        foreach ($contragentRelations as $relation) {
            $result[$relation['type']['translatable']['name']][] = $relation;
        }
        
        return $result;
    }

}
