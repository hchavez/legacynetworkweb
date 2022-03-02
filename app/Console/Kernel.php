<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sync:synergy')->hourly();
        $schedule->command('authnet:deactivate')->dailyAt('01:00');
        $schedule->command('authnet:reactivate')->dailyAt('02:00');
        $schedule->command('authnet:expiredcards')->monthly();
        $schedule->command('authnet:validate_subscription')->dailyAt('03:00');
//        $schedule->command('authnet:delete')->dailyAt('03:00');
        //$schedule->command('backup:compress')->daily();
        //$schedule->command('backup:mysql-dump')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
