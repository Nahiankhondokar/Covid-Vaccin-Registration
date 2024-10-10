<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\vaccinNotification;
use Illuminate\Console\Command;
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
        $users = User::with('vaccinCenter')->get();
        foreach($users as $user){
            Notification::send($user, new vaccinNotification($user));
        }

        $this->info('Vaccination remiders are completed');
    }
}