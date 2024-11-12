<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Timezone;

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
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'email' => 'required|email|unique:providers,email',
            'phone_number' => 'required|string|unique:providers,phone_number',
            'profile_picture' => 'nullable|image|max:2048',
            'address' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'speciality_id' => 'required|exists:specialities,id',
            'sub_specialization' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer',
            'qualifications' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|unique:providers,license_number',
            'license_authority' => 'nullable|string|max:255',
            'license_expiry' => 'nullable|date',
            'bio' => 'nullable|string',
            'consultation_days' => 'required|array',
            'consultation_days.*' => 'string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'consultation_hours.start' => 'required|date_format:H:i',
            'consultation_hours.end' => 'required|date_format:H:i',
            'time_zone' => 'nullable|string',
            'max_consultations_per_day' => 'nullable|integer',
            'consultation_fee' => 'nullable|numeric',
            'consultation_type' => 'nullable|in:video,audio,chat,in-person',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'consultation_duration' => 'nullable|integer',
            'registered_date' => 'nullable|date',
        ]);
    
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
    
        $validated['consultation_days'] = implode(',', $validated['consultation_days']);
        $validated['consultation_hours'] = json_encode([
            'start' => $validated['consultation_hours']['start'],
            'end' => $validated['consultation_hours']['end'],
        ]);
        $userId = Auth::user()->id;
        $validated['user_id'] = $userId->id; 
        Provider::create($validated);
    
        return redirect()->route('providers.index')->with('success', 'Provider created successfully.');
    }
}
