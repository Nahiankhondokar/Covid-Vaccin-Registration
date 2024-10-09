<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::prefix('covid-vaccin')->group(function(){
    Route::get('/registration', []);
});