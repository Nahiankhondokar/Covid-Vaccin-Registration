<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class VaccinDateDistribute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaccin-date:distribute';

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
        $users = User::query()
        ->with('vaccin_center')
        ->get();

        foreach($users as $user){

            $nextDate = $this->getNextDate($user);
            if($nextDate){
                $user->vaccin_date = $nextDate->format('Y-m-d');
                $user->update();
            }
        }

        $this->info('Vaccination date is distributed');
    }

    protected function getNextDate($user)
    {
        $nextDate = $this->sundayOrThursday($user->created_at);

        while(!$this->checkAvailableDozLimit($nextDate, $user)){
            $nextDate = $this->sundayOrThursday($nextDate)->addDay();
        }
        return $nextDate;
    }

    protected function checkAvailableDozLimit($nextDate, $user)
    {
        $bookedVaccinDoz = User::where('vaccin_center_id', $user->vaccin_center->id)
        ->where('vaccin_date', $nextDate->format('Y-m-d'))
        ->count();

        $vaccinCenterCapacity = $user->vaccin_center->doz_limit_per_day;
    
        return $vaccinCenterCapacity > $bookedVaccinDoz;
    }

    protected function sundayOrThursday($created_at)
    {
        $nextDate = Carbon::parse($created_at)->addDay();
        while (!$nextDate->isSunday() && !$nextDate->isThursday()) {
            $nextDate->addDay();
        }

        return $nextDate;
    }
}
