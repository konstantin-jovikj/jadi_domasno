<?php

namespace App\Console\Commands;

use App\Models\Availability;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteOldDishAvailableDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:old-dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete available date for dishes that are older than today';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $today = now()->toDateString();

        DB::table('availabilities')
            ->where('available_date', '<', $today)
            ->delete();

        $this->info('Old dates for availability of the dishes deleted successfully.');
    }
}
