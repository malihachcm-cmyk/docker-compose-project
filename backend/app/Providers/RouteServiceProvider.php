<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| LESSON: Route Service Provider
|--------------------------------------------------------------------------
|
| This provider loads your route files and configures routing.
|
| Key Concepts:
| 1. Route Groups - Apply settings to multiple routes at once
| 2. Middleware - Code that runs before/after controller
| 3. Prefix - Add a prefix to all routes (e.g., /api)
| 4. Rate Limiting - Prevent abuse (too many requests)
|
*/

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Configure rate limiting for API
        $this->configureRateLimiting();

        // Load route files
        $this->routes(function () {
            // API Routes
            // - Apply 'api' middleware group
            // - Prefix all routes with '/api'
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Web Routes
            // - Apply 'web' middleware group
            // - No prefix (routes start from /)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure rate limiting
     *
     * Rate limiting prevents abuse by limiting requests per time period.
     * Example: 60 requests per minute per IP address
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });
    }
}
