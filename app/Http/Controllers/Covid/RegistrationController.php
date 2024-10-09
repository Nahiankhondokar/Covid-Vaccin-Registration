<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index():View
    {
        return view('covid.index');
    }
}
