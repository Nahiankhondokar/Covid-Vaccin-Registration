<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index():View
    {
        return view('covid.register');
    }
    
    public function search():View
    {
        return view('covid.search');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        dd($request->all());
        return redirect()->back()->with('success', 'Registration successfull.');
    }
}
