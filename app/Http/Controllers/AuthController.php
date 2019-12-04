<?php

use App\Models\Repositories\User\UserRepositoryInterface as UserRepositoryInterface;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request as Request;

/**
 * Description of AuthController 
 * 
 * The Authentication controller is responsible for user's authentication
 */
class AuthController extends BaseController {

    /**
     * User repository
     * @var type 
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepository = $userRepo;
    }

    /**
     * Login form
     * @return type
     */
    public function getLogin() {
        if (Session::has('cookieString')) {
            return Redirect::route('home');
        }

        return View::make('auth.login');
    }

    /**
     * Login user with username (email) and password
     * @param Request $request
     * @return type
     */
    public function postLogin(Request $request) {

        $validator = Validator::make(Input::all(), array(
                    'username' => 'required|email',
                    'password' => 'required|string'
                        )
        );
        
        if ($validator->fails()) {
            return Redirect::route('login_get')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            
            if($this->userRepository->authenticate($request) === true) {
//                return redirect()->intended('/');
                return redirect()->route('home');
            }
            
            $validator->getMessageBag()->add('password', 'Wrong password ');
            
            return Redirect::route('login_get')
                    ->withErrors($validator)
                    ->withInput();
        }
    }

    /**
     * Flush the session, logout the current user and redirect him to the login page
     * @return type
     */
    public function getLogout() {
        Session::flush();
        Cache::flush();
        Auth::logout();
        return Redirect::route('login_get');
    }

}
