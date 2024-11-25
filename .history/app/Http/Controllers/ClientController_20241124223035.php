<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Patients;
use App\Models\Speciality;
use App\Models\Timezone;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('clientside.index');
    }
    public function profile()
    {
        $patients = Patients::where('user_id', Auth::user()->id)->first(); 
        return view('clientside.profile', compact('patients'));

    }
    public function plan()
    {
        return view('clientside.plan');
    }
}