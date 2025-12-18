<?php

/*
|--------------------------------------------------------------------------
| LESSON: Web Routes vs API Routes
|--------------------------------------------------------------------------
|
| web.php  → For browser pages (HTML, forms, sessions)
| api.php  → For API endpoints (JSON, stateless)
|
| Since we're using React for frontend, we mainly use api.php
| The web.php is kept minimal
|
*/

use Illuminate\Support\Facades\Route;

// Root route - just redirect to info
Route::get('/', function () {
    return response()->json([
        'message' => 'Laravel Backend is running!',
        'api_endpoints' => [
            'GET /api/health' => 'Health check',
            'GET /api/demo' => 'Demo data',
            'GET /api/info' => 'System info',
        ]
    ]);
});
