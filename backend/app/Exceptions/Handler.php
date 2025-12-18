<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

/*
|--------------------------------------------------------------------------
| LESSON: Exception Handler - Error Management
|--------------------------------------------------------------------------
|
| When something goes wrong (errors, exceptions), this class handles it.
| It decides:
| - What to log
| - What to show the user
| - How to format the error response
|
*/

class Handler extends ExceptionHandler
{
    /**
     * Exceptions that should not be reported (logged)
     */
    protected $dontReport = [
        //
    ];

    /**
     * Inputs that should never be shown in logs (security)
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register exception handling callbacks
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
