<?php

//use Illuminate\Support\Facades\Input as Input;
//use Illuminate\Http\Request as Request;

/**
 * Description of UIController 
 * 
 */
class UIController extends BaseController {

    public function __construct() {
        
    }

    /**
     * Change user layout settings
     * @param type $style
     * @return type
     */
    public function changeLayout($style) {
        $layouts = \Config::get('ui.layouts');

        if (in_array($style, $layouts)) {
            \Session::put('layoutstyle', $style);

            return \Redirect::back()
                            ->with('success', \Lang::get('labels.changelayoutstyle-success'));
        }

        return \Redirect::back()
                        ->with('error', \Lang::get('labels.changelayoutstyle-unsuccess'));
    }

    /**
     * Change grid style - table, grid
     * @param type $type
     * @return type
     */
    public function changeDisplayType($type) {
        $displayTypes = array_pluck(\Config::get('ui.displaytype'), 'type');

        if (in_array($type, $displayTypes)) {
            \Session::put('displaytype', $type);

            return \Redirect::back()
                            ->with('success', \Lang::get('labels.changedisplaytype-success'));
        }

        return \Redirect::back()
                        ->with('error', \Lang::get('labels.changedisplaytype-unsuccess'));
    }

}
