<?php

class LanguageController extends BaseController {

    /**
     * Sending a request to the server for changing the language.
     * @param type $lang
     * @return type
     */
    public function langSetter($lang) {
        if (Session::has('cookieString')) {
            $responseArray = \LangAPI::setLang($lang);

            if (isset($responseArray['data']['status']) && $responseArray['data']['status'] === 'success') {
                //TO DO: 
                \Session::put('language', $lang);
                \App::setLocale($lang);

                \UI::setNavigation($responseArray);

                \Cache::forget('leftNav');
            }


            return Redirect::route('home')
                            ->with('success', $responseArray['message']);
        }
        
        return Redirect::route('logout');
    }

}
