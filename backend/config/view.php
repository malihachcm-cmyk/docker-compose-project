<?php
// ============================================================
// LESSON: Laravel View Configuration
// ============================================================
// This file tells Laravel where to find view templates.
// For API-only applications, we still need this config
// because some parts of Laravel depend on it.
// ============================================================

return [
    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views.
    |
    */
    'paths' => [
        base_path('resources/views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */
    'compiled' => env(
        'VIEW_COMPILED_PATH',
        base_path('storage/framework/views')
    ),
];
