<?php

/*
|--------------------------------------------------------------------------
| LESSON: API Routes - URL Mapping
|--------------------------------------------------------------------------
|
| Routes tell Laravel: "When someone visits this URL, run this code"
|
| Anatomy of a route:
|
|   Route::get('/health', [ApiController::class, 'health']);
|         ↓       ↓              ↓                    ↓
|      Method   URL        Controller class     Method to call
|
| HTTP Methods:
| - GET    → Retrieve data (reading)
| - POST   → Create new data
| - PUT    → Update existing data
| - DELETE → Remove data
|
| All routes in this file are automatically prefixed with /api
| So '/health' becomes '/api/health'
|
*/

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Health Check Route
|--------------------------------------------------------------------------
| GET /api/health
| Used by React to check if backend is running
*/
Route::get('/health', [ApiController::class, 'health']);

/*
|--------------------------------------------------------------------------
| Demo Route
|--------------------------------------------------------------------------
| GET /api/demo
| Returns sample data
*/
Route::get('/demo', [ApiController::class, 'demo']);

/*
|--------------------------------------------------------------------------
| Info Route
|--------------------------------------------------------------------------
| GET /api/info
| Returns system architecture information
*/
Route::get('/info', [ApiController::class, 'info']);
