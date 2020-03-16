<?php

namespace App\Console;

use App\Console\Commands\GrabNews;
use App\Console\Commands\GrabKawalCovid;
use App\Console\Commands\UpdateNewsRegion;
use App\Console\Commands\SendNotifications;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        GrabKawalCovid::class,
        GrabNews::class,
        SendNotifications::class,
        UpdateNewsRegion::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        // pull data every hour
        // disabled for news branch
        // $schedule->command('grab:kawalcovid')->everyFifteenMinutes();
        // $schedule->command('notifications:send')->everyFiveMinutes();

        $schedule->command('grab:news')->everyTenMinutes();
    }
}
