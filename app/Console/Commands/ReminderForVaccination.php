<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\VaccinNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class ReminderForVaccination extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:vaccination';

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
        $users = User::with('vaccin_center')->get();
        
        foreach($users as $key => $user){
           if($user->vaccin_date){
                $previousDay = Carbon::parse($user->vaccin_date)->subDay();
                $previousDayTime = Carbon::parse($user->vaccin_date)->subDay()->setTime(21, 00)->format('H:i');

                if($previousDay == Carbon::today() && date("H:i") == $previousDayTime){
                    Notification::send($user, new VaccinNotification($user)); 
                }
           }
        }

        $this->info('Vaccination remiders are completed');
    }
}
