<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/*
|--------------------------------------------------------------------------
| LESSON: Console Kernel - Scheduled Tasks
|--------------------------------------------------------------------------
|
| This handles "artisan" commands and scheduled tasks.
|
| Artisan is Laravel's CLI tool:
|   php artisan migrate     → Run database migrations
|   php artisan serve       → Start development server
|   php artisan make:model  → Create a new model
|
*/

class Kernel extends ConsoleKernel
{
    /**
     * Define scheduled tasks
     * Example: $schedule->command('emails:send')->daily();
     */
    protected function schedule(Schedule $schedule): void
    {
        // Define your scheduled tasks here
    }

    /**
     * Register artisan commands
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
