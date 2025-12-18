<?php

/*
|--------------------------------------------------------------------------
| LESSON: bootstrap/app.php - Create The Application
|--------------------------------------------------------------------------
|
| This file creates and configures the Laravel application.
| Think of it as "setting up the kitchen before cooking"
|
*/

// Create new Laravel Application instance
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| "Binding" tells Laravel: "When someone asks for X, give them Y"
| This is Dependency Injection - a core concept in Laravel
|
*/

// When app needs HTTP Kernel, use our App\Http\Kernel
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

// When app needs Console Kernel, use our App\Console\Kernel
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

// When app needs Exception Handler, use ours
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// Return the configured application
return $app;
