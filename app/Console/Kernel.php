<?php

namespace App\Console;

use App\Console\Commands\Inspire;
use App\Console\Commands\LogCurrentDatetime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\Sample\Scheduler;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Inspire::class,
        LogCurrentDatetime::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
            ->hourly();

        $schedule->command('log:time')->everyFiveMinutes();

        app(Scheduler::class)->schedule($schedule);
    }
}
