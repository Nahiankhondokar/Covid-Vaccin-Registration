<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckVaccinStatusRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Models\VaccinCenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index():View
    {
        $centers = VaccinCenter::query()->get();
        return view('covid.register', ['centers' => $centers]);
    }
    
    public function search():View
    {
        return view('covid.search');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::query()->create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'nid_no'        => $request->nid_no,
            'vaccin_center_id'=> $request->vaccin_center_id,
        ]);
            
        return redirect()->back()->with('success', "Registration successfull");
    }

    public function vaccinStatus(CheckVaccinStatusRequest $request)
    {
       $user = User::query()
       ->select('id', 'nid_no', 'vaccin_status')
       ->where('nid_no', $request->nid_no)
       ->first();

       if(!$user){
        return redirect()->route('covid.register')->with('status', 'Not registered');
       }

       return redirect()->back()->with('status', $user->vaccin_status);
    }
}