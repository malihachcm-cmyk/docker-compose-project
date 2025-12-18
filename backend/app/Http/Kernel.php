<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/*
|--------------------------------------------------------------------------
| LESSON: HTTP Kernel - Middleware Stack
|--------------------------------------------------------------------------
|
| WHAT IS MIDDLEWARE?
| Middleware is code that runs BEFORE/AFTER your controller.
| Like security guards checking your ticket before entering a concert.
|
| Request → Middleware1 → Middleware2 → Controller → Middleware2 → Middleware1 → Response
|
| Common middleware:
| - Authentication: Is user logged in?
| - CORS: Can this website access our API?
| - CSRF: Is this a legitimate form submission?
|
*/

class Kernel extends HttpKernel
{
    /**
     * Global middleware - runs on EVERY request
     */
    protected $middleware = [
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Middleware groups - apply multiple middleware with one name
     */
    protected $middlewareGroups = [
        // "web" group - for browser requests (forms, sessions)
        'web' => [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ],

        // "api" group - for API requests (stateless, no sessions)
        'api' => [
            'throttle:api',
        ],
    ];

    /**
     * Individual middleware aliases
     */
    protected $middlewareAliases = [
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
