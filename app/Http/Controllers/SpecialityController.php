<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\Provider;
use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = Speciality::with('country')->get();
        $countries = Country::all();
        return view('specialities.list', compact('specialities','countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'speciality_name' => 'required|string|max:255',
            'speciality_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country_id' => 'required|exists:countries,id', 
        ]);

        $imagePath = $request->file('speciality_image')->store('specialities', 'public');

        Speciality::create([
            'speciality_name' => $request->speciality_name,
            'speciality_image' => $imagePath,
            'country_id' => $request->country_id, 
        ]);

        return redirect()->route('specialities.index')->with('success', 'Speciality added successfully.');
    }

    public function update(Request $request, $speciality)
    {
        $request->validate([
            'speciality_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id', 
            'speciality_image' => 'required'
        ]);

        $speciality = Speciality::findOrFail($speciality);
        $speciality->speciality_name = $request->input('speciality_name');
        $speciality->country_id = $request->input('country_id'); 
        if ($request->hasFile('speciality_image')) {
        if ($speciality->speciality_image && Storage::disk('public')->exists($speciality->speciality_image)) {
            Storage::disk('public')->delete($speciality->speciality_image);
        }
        $imagePath = $request->file('speciality_image')->store('specialities', 'public');
        $speciality->speciality_image = $imagePath;
    }
        $speciality->save();

        return redirect()->route('specialities.index')->with('success', 'Speciality updated successfully.');
    }

    public function destroy(Speciality $speciality)
    {
        if (Storage::disk('public')->exists($speciality->speciality_image)) {
            Storage::disk('public')->delete($speciality->speciality_image);
        }
        $speciality->delete();

        return redirect()->route('specialities.index')->with('success', 'Speciality deleted successfully.');
    }
    public function getSpecialities(Request $request)
    {
        $validated = $request->validate([
            'country_id' => 'nullable|exists:countries,id', 
        ]);
        $countryId = $validated['country_id'] ?? null; 
        $specialitiesQuery = Speciality::query();
        if ($countryId) {
            $specialitiesQuery->where('country_id', $countryId);
        }
        $specialities = $specialitiesQuery->get();
        $responseData = $specialities->map(function ($speciality) {
            return [
                'id' => $speciality->id,
                'speciality_name' => $speciality->speciality_name,
                'speciality_image' => $speciality->speciality_image ? asset('storage/' . $speciality->speciality_image) : null,
            ];
        });
        return response()->json([
            'status' => 'success',
            'data' => $responseData
        ]);
    }

    public function getPatientsAndProviders()
    {
        // Fetch all providers with specific fields
        $providers = Provider::all(['id', 'user_id', 'email', 'full_name']);

        // Format providers' data
        $providersData = $providers->map(function ($provider) {
            return [
                'id' => $provider->id,
                'user_id' => $provider->user_id,
                'email' => $provider->email,
                'full_name' => $provider->full_name,
            ];
        });

        // Fetch all patients with specific fields
        $patients = Patients::all(['id', 'user_id', 'email', 'name']);

        // Format patients' data
        $patientsData = $patients->map(function ($patient) {
            return [
                'id' => $patient->id,
                'user_id' => $patient->user_id,
                'email' => $patient->email,
                'name' => $patient->name,
            ];
        });

        // Combine data for the response
        return response()->json([
            'status' => 'success',
            'data' => [
                'providers' => $providersData,
                'patients' => $patientsData,
            ],
        ]);
    }

}

