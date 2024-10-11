<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('vaccin-date:distribute')
->daily()
->withoutOverlapping();

Schedule::command('user:vaccinated')
->daily()
->withoutOverlapping();

Schedule::command('reminder:vaccination')
->hourly()
->withoutOverlapping();