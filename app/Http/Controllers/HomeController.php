<?php

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request as Request;
use App\Models\Repositories\Activity\ActivityRepositoryInterface;

/**
 * Description of HomeController 
 * 
 */
class HomeController extends BaseController {

    public $activity;

    public function __construct(ActivityRepositoryInterface $activity) {
        $this->activity = $activity;
    }

    /**
     * Get user activity log
     * @param Request $request
     * @return type
     */
    public function index(Request $request) {
        $activities = $this->activity->show(\Input::all());

        $paginator = $this->paginate($request, $activities['data'], $activities['data']['data'], []);

        if ($request->ajax()) {
            return view('activity.load')
                            ->with('activities', $activities['data'])
                            ->with('paginator', $paginator)
                            ->with('pagination_config', $activities['data'])
                            ->render();
        }

        return View::make('home')
                        ->with('activities', $activities['data'])
                        ->with('paginator', $paginator)
                        ->with('pagination_config', $activities['data']);
    }

    /**
     * User profile data
     * @return type
     */
    public function profile() {
        return View::make('home');
    }

    /**
     * Special user settings and preferences 
     * @return type
     */
    public function settings() {
        return View::make('home');
    }

}
