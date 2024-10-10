<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
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
        $vaccinCenterDozCapacity = VaccinCenter::query()
            ->select('id','name', 'doz_limit_per_day')
            ->withCount('users')
            ->find($request->vaccin_center_id);

        $availableDozCapacity = $vaccinCenterDozCapacity->doz_limit_per_day - $vaccinCenterDozCapacity->users_count;
        
        $dayOfWeek = Carbon::parse($request->vaccin_date,)->format('l');
        
        if($availableDozCapacity > 0){
            User::query()->create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'vaccin_date'   => $request->vaccin_date,
                'nid_no'        => $request->nid_no,
                'vaccin_doz'    => 1,
                'vaccin_center_id'=> $request->vaccin_center_id,
            ]);
            
            return redirect()->back()->with('success', "Registration successfull for $dayOfWeek");
        }else {
            return redirect()->back()->with('error', "This $vaccinCenterDozCapacity->name has not enough doz for $dayOfWeek");
        }
        
    }
}