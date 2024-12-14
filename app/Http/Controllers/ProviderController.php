<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Provider;
use App\Models\Speciality;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Timezone;
use Illuminate\Http\Request;
use App\Models\User;


class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::with('speciality')->get(); 
        return view('providers.list', compact('providers'));
    }
    public function create()
    {
        $timezones = Timezone::all();
        $specialities = Speciality::all();
        $countries = Country::all();
        return view('providers.add', compact('specialities','timezones','countries'));
    }
    public function store(Request $request)
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
        'status' => 'nullable|in:active,inactive,pending',
        'is_verified' => 'boolean',
        'registered_date' => 'nullable|date',
        'last_login' => 'nullable|date',
    ]);

    if ($request->hasFile('profile_picture')) {
        $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    $validated['consultation_days'] = implode(',', $validated['consultation_days']);
    $validated['consultation_hours'] = json_encode([
        'start' => $validated['consultation_hours']['start'],
        'end' => $validated['consultation_hours']['end'],
    ]);

    // Create the user with the provided email and default password
    $user = User::create([
        'name' => $validated['full_name'],
        'email' => $validated['email'],
        'password' => Hash::make('123456'), // Default password
        // Add any other necessary fields for the User model if needed
    ]);

    // Save the provider with the user_id
    $validated['user_id'] = $user->id; // Set the user_id from the created user
    Provider::create($validated);

    return redirect()->route('providers.index')->with('success', 'Provider created successfully.');
}
    public function show($id)
    {
        $provider = Provider::with('speciality')->findOrFail($id); 
        return view('providers.show', compact('provider'));
    }
    public function edit($id)
    {
        $timezones = Timezone::all();
        $provider = Provider::findOrFail($id);
        $specialities = Speciality::all(); 
        return view('providers.edit', compact('provider', 'specialities','timezones'));
    }
    public function update(Request $request, $id)
    {
        $provider = Provider::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:providers,email,' . $provider->id,
            'phone_number' => 'required|string|unique:providers,phone_number,' . $provider->id,
            'speciality_id' => 'required|exists:specialities,id',
            'consultation_fee' => 'nullable|numeric',
            'consultation_type' => 'required|in:video,audio,chat,in-person',
        ]);

        $provider->update($request->all());
        return redirect()->route('providers.index')->with('success', 'Provider updated successfully.');
    }
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully.');
    }
    public function getProviders(Request $request)
    {
    
        $validated = $request->validate([
            'country_id' => 'nullable|exists:countries,id', 
        ]);
        $countryId = $validated['country_id'] ?? null;
        $providersQuery = Provider::with('speciality'); 
        if ($countryId) {
            $providersQuery->where('nationality', $countryId);
        }
        $providers = $providersQuery->get();
        $responseData = $providers->map(function ($provider) {
            return [
                'id' => $provider->id,
                'full_name' => $provider->full_name,
                'profile_picture' => $provider->profile_picture 
                    ? Storage::url($provider->profile_picture) 
                    : null,
                'speciality' => $provider->speciality->speciality_name ?? null,
                'experience_years' => $provider->experience_years,
                'consultation_fee' => $provider->consultation_fee,
                'consultation_days' => $provider->consultation_days,
                'consultation_hours' => $provider->consultation_hours,
            ];
        });
        return response()->json([
            'status' => 'success',
            'data' => $responseData,
        ]);
    }

}
