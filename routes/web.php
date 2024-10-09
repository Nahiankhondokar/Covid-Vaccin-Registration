<?php

use App\Http\Controllers\Covid\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('covid-vaccin')->name('covid.')->group(function(){
    Route::get('/registration', [RegistrationController::class, 'index'])->name('register');
    Route::get('/search', [RegistrationController::class, 'search'])->name('search');
});