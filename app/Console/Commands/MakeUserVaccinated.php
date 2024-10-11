<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class MakeUserVaccinated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:vaccinated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->format('Y-m-d');

        User::where('vaccin_status', '!=', 'Vaccinated')
            ->whereDate('vaccin_date', '=', $today)
            ->update(['vaccin_status' => 'Vaccinated']);

        $this->info('Users are vaccinated');
    }
}
