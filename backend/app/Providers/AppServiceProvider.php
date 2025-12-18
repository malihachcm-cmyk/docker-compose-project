<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/*
|--------------------------------------------------------------------------
| LESSON: Service Providers - Bootstrap Laravel
|--------------------------------------------------------------------------
|
| Service Providers are the central place of Laravel bootstrapping.
| "Bootstrapping" = Getting the application ready to handle requests
|
| Think of it like opening a restaurant:
| - register(): Stock the pantry (register services)
| - boot(): Turn on the lights, prepare tables (final setup)
|
| The order matters: ALL register() methods run first, THEN boot()
|
*/

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * This is where you bind things into the service container.
     * The container is like a central registry of all components.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * Called AFTER all providers have been registered.
     * Use this for things that depend on other services.
     */
    public function boot(): void
    {
        //
    }
}
