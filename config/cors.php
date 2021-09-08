<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    //header('Access-Control-Allow-Origin: *');
   // header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept , access_token");
   // header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    'paths' => ['*'],
    'allowed_methods' => ['POST', 'GET' , 'PUT' , 'DELETE'],
    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['access-token' , 'origin' , 'x-requested-with' , 'content-type' , 'accept'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
