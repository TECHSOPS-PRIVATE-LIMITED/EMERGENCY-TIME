<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
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
        ]);

        $speciality = Speciality::findOrFail($speciality);
        $speciality->speciality_name = $request->input('speciality_name');
        $speciality->country_id = $request->input('country_id'); 
         // Check if a new image is uploaded
    if ($request->hasFile('speciality_image')) {
        // Delete the old image if it exists
        if ($speciality->speciality_image && Storage::disk('public')->exists($speciality->speciality_image)) {
            Storage::disk('public')->delete($speciality->speciality_image);
        }

        // Store the new image
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
            'country_id' => 'required|exists:countries,id',
        ]);
        $countryId = $validated['country_id'];
        $specialities = Speciality::where('country_id', $countryId)->get();
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
}
