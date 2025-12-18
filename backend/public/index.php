<?php

/*
|--------------------------------------------------------------------------
| LESSON: public/index.php - The Entry Point
|--------------------------------------------------------------------------
|
| EVERY request to your Laravel app comes through this file.
| It's like the front door of your house.
|
| Flow:
| 1. User makes request → Nginx → public/index.php
| 2. index.php loads Laravel framework
| 3. Laravel processes request
| 4. Response sent back to user
|
*/

// Define the start time for performance tracking
define('LARAVEL_START', microtime(true));

// Load Composer's autoloader
// This makes all installed packages available
require __DIR__.'/../vendor/autoload.php';

// Load the Laravel application
$app = require_once __DIR__.'/../bootstrap/app.php';

// Get the HTTP Kernel (handles web requests)
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Handle the incoming request and get response
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Send response back to user's browser
$response->send();

// Perform cleanup tasks
$kernel->terminate($request, $response);
