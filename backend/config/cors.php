<?php

/*
|--------------------------------------------------------------------------
| LESSON: CORS - Cross-Origin Resource Sharing
|--------------------------------------------------------------------------
|
| WHAT IS CORS?
| When a website (frontend.com) tries to access another site's API
| (api.backend.com), the browser blocks it by default for security.
|
| CORS headers tell the browser: "It's okay, I allow this website"
|
| WITHOUT CORS:
|   React (localhost:3000) → Laravel (localhost:8000) = BLOCKED!
|
| WITH CORS:
|   Laravel sends header: "I allow localhost:3000"
|   React (localhost:3000) → Laravel (localhost:8000) = SUCCESS!
|
| In our Docker setup, Nginx handles routing so CORS is less of an issue,
| but it's important to understand!
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Paths that should have CORS headers
    |--------------------------------------------------------------------------
    | '*' means all paths
    | 'api/*' means only /api routes
    */
    'paths' => ['api/*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed HTTP Methods
    |--------------------------------------------------------------------------
    */
    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins (websites that can access your API)
    |--------------------------------------------------------------------------
    | '*' = everyone (not recommended for production)
    | Better: ['https://yourfrontend.com']
    */
    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    */
    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    | If true, allows cookies/auth headers in CORS requests
    */
    'supports_credentials' => false,

];
