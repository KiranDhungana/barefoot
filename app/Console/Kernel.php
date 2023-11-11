<?php

namespace App\Console;

use App\Models\account;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // $find = account::find(1);
            // $acc = new account;
            // Your logic to update a value in the database
            // $current_time = now(); // Laravel helper function to get the current time
            // $value_to_add = 10; // Replace with the value you want to add
            // $data = account::all();
            // $find['fee'] = $find['fee'] + 10;

            $length = account::count();
            for ($i = 1; $i <= $length + 1; $i++) {

                $find = account::find($i);

                if ($find == NULL) {
                    continue;
                } else {
                    $find['fee'] = $find['fee'] + ($find['fee'] / 30);

                    $find->save();
                }

            }
            // $find->save();
        })->everyMinute(); // Example: Run the task daily at 12:00 PM
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