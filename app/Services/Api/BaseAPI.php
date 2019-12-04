<?php

namespace App\Services\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect as Redirect;
use App\Exceptions\AccessDenied;

class BaseAPI {

    public $client;
    protected $routes = array('ReportController@show');
    protected $server_uri;

    /**
     * Importing the Guzzle client with predefined domain name.
     * @param Client $client
     */
    public function __construct() {
        $this->setServerUri();
        $this->client = new \GuzzleHttp\Client();
    }

    protected function setServerUri() {
        $this->server_uri = \Config::get('api.server_uri');
    }

    /**
     * Function that validates the response and manage some of 
     * the default content returned from the server
     * @param type $response
     * @return string
     */
    protected function validate($response) {
        $responseData = json_decode($response->getBody(), true);

        if (!$response->hasHeader('Authorization')) {
            \Session::flush();
            \Cache::flush();
            \Auth::logout();

            throw new \Illuminate\Auth\AuthenticationException('Unauthenticated.', []);
        }

        $autorization = $response->getHeader('Authorization');
        \Session::put('cookieString', $autorization['0']);

        if (in_array($responseData['status_code'], array(201, 202, 204))) {
            $responseData['status'] = 'success';
            return $responseData;
        }

        if (in_array($responseData['status_code'], array(401))) {
            \Session::flush();
            \Cache::flush();
            \Auth::logout();

            throw new \Illuminate\Auth\AuthenticationException('Unauthenticated.', []);
        }

        //HTTP_NOT_ACCEPTABLE OR FORM VALIDATION FAILED
        if (in_array($responseData['status_code'], array(406))) {
            return $responseData;
        }
        
        if (in_array($responseData['status_code'], array(403))) {
            throw new AccessDenied();
        }

//        if (in_array($responseData['status_code'], array(404, 423, 499))) {
//            $responseData['status'] = 'error';
//            abort($responseData['status_code'], $responseData['message']);
//        }

        //TO DO: change logic of response
        return $responseData;
    }

    /**
     * Sending a request to the server, with specified URL, method and data
     * @param type $method
     * @param type $uri
     * @param type $data
     * @return type
     */
    public function sendRequest($method, $uri, $data = null, $headers = []) {
//        $guzzleRequest = new \GuzzleHttp\Psr7\Request(
//                $method, $uri
//        );
//        $response = $this->client->send($guzzleRequest);

        $sysHeaders = [
            'Authorization' => \Session::get('cookieString', null),
            'Accept' => 'application/json',
            'Content-Language' => \Session::get('language', null),
        ];
        
        return $this->client->request($method, $this->server_uri . $uri, [
                    'headers' => array_merge($sysHeaders, $headers),
                    'form_params' => $data
        ]);

//        use GuzzleHttp\Psr7\MultipartStream;
//        $multipart = new MultipartStream([
//        [
//            'name' => 'upload_file',
//            'contents' => fopen('path/to/file', 'r')
//        ],
//        // ... more fields
//    ]);
//        $request = new Request(
//    'POST', 
//    'https://xyz.acme.dev/api/upload', 
//    [], 
//    $multipart
//);
//$response = $client->send($request);
//        if (isset($data['files'])) {
//            $allFiles = $data['files'];
//            unset($data['files']);
//            $postBody = $request->getBody();
//            $postBody->setField('data', $data);
//            $temporaryUploadPath = public_path() . '/tempUploads/' . str_random(10);
//            //Caching the temp folder where the files will be moved, 
//            //and deleted after the response from the server
//            \Session::set('temporaryUploadPath', $temporaryUploadPath);
//            foreach ($allFiles as $sectionIdOrElementName => $files) {
//                if (is_array($files)) {
//                    foreach ($files as $id_grid_row => $file) {
//                        if ($file instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
//                            $filename = $file->getClientOriginalName();
//                            $file->move($temporaryUploadPath, $filename);
//                            $postBody->addFile(new \GuzzleHttp\Post\PostFile('files[' . $sectionIdOrElementName . '][]', fopen($temporaryUploadPath . '/' . $filename, 'r')));
//                        } else {
//                            if (is_array($file)) {
//                                foreach ($file as $file_name => $f) {
//                                    if ($f instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
//                                        $filename = $f->getClientOriginalName();
//                                        $f->move($temporaryUploadPath, $filename);
//                                        $postBody->addFile(new \GuzzleHttp\Post\PostFile('files[' . $sectionIdOrElementName . '][' . $id_grid_row . '][' . $file_name . '][]', fopen($temporaryUploadPath . '/' . $filename, 'r')));
//                                    }
//                                }
//                            }
//                        }
//                    }
//                } else {
//                    if ($files instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
//                        $filename = $files->getClientOriginalName();
//                        $files->move($temporaryUploadPath, $filename);
//                        $postBody->addFile(new \GuzzleHttp\Post\PostFile('files[' . $sectionIdOrElementName . '][]', fopen($temporaryUploadPath . '/' . $filename, 'r')));
//                    }
//                }
//            }
//        } else {
//            if ($method == 'POST') {
//                $postBody = $request->getBody();
//                $postBody->setField('data', $data);
//            }
//        }
//        var_dump($data);
//        echo '=<br>';
//        die;
    }

    /**
     * Modifying the current URL and adding it the current client's route
     * in order the server to know client's route identification 
     * and return its widgets
     * @param type $uri
     * @param type $method
     * @return string
     */
    private function modifyURL($uri, $method) {
        if (!\Request::ajax() && $method == 'GET' && \Session::has('client_route') && !in_array(\Route::currentRouteAction(), $this->routes)) {
            if (empty(\Input::all()))
                $uri.='?client_route=' . \Session::get('client_route');
            else
                $uri.='&client_route=' . \Session::get('client_route');
        }
        return $uri;
    }

    /**
     * Add params to given uri and return modified uri string
     * @param type $uri
     * @param type $params
     * @return string
     */
    protected function addParams($uri, $params) {

        return $uri . '?' . http_build_query($params);

//        if ($params) {
//            $uri .= '?';
//
//            foreach ($params as $key => $value) {
//                $uri .= $key . '=' . $value . '&';
//            }
//        }
//
//        return $uri;
    }

    public function checkPage(&$params) {
        if (isset($params['search'])) {
            $params['page'] = 1;
            unset($params['search']);
        }

        return $params;
    }
    
}
