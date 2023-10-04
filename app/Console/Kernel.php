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
        Commands\DemoCron::class,
        Commands\UserSubscriptionCron::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('demo:cron')->dailyAt('11:55')->timezone('Asia/Kathmandu');
        //$schedule->command('demo:cron')->everyMinute()->timezone('Asia/Kathmandu');
        $schedule->command('usersubscription:cron')->dailyAt('00:05')->timezone('Asia/Kathmandu')->withoutOverlapping();
        // $schedule->command('usersubscription:cron')->everyMinute()->timezone('Asia/Kathmandu')->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
