<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Timezone;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    public function index()
    {
        return view('site.site');
    }

    public function providerregisteration()
    {
        $timezones = Timezone::all();
        $specialities = Speciality::all();
        return view('site.provider',compact('timezones','specialities'));
    }

    public function providerstore(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'email' => 'required|email|unique:providers,email',
            'phone_number' => 'required|string|unique:providers,phone_number',
            'speciality_id' => 'required|exists:specialities,id',
            'license_number' => 'nullable|string|unique:providers,license_number',
            'license_authority' => 'nullable|string|max:255',
            'license_expiry' => 'nullable|date',
        ]);
        $user = User::create([
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => Hash::make('1234'),  
        ]);
        $validated['user_id'] = $user->id;
        Provider::create($validated);

        $role = Role::where('id', '2')->first();
        if ($role) {
            $user->roles()->attach($role->id); 
        }
        return redirect()->route('provider.success')->with('success', 'Application is Succesfully Submitted.');
    }

    public function providersuccess()
    {
        return view('site.success');
    }
}
