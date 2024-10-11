<?php

use App\Http\Controllers\Covid\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('covid-vaccin')->name('covid.')->group(function(){
    Route::get('/registration', [RegistrationController::class, 'index'])->name('register');
    Route::post('/store', [RegistrationController::class, 'store'])->name('store');
    Route::get('/search', [RegistrationController::class, 'search'])->name('search');
    Route::post('/search', [RegistrationController::class, 'vaccinStatus'])->name('status');
});