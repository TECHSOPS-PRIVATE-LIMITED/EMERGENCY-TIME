<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    // Show the form and list of specialities
    public function index()
    {
        $specialities = Speciality::all();
        return view('specialities.index', compact('specialities'));
    }

    // Store a new speciality
    public function store(Request $request)
    {
        $request->validate([
            'speciality_name' => 'required|string|max:255',
            'speciality_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        $imagePath = $request->file('speciality_image')->store('specialities', 'public');

        // Create the speciality
        Speciality::create([
            'speciality_name' => $request->speciality_name,
            'speciality_image' => $imagePath,
        ]);

        return redirect()->route('specialities.index')->with('success', 'Speciality added successfully.');
    }

    // Delete a speciality
    public function destroy(Speciality $speciality)
    {
        // Delete the image file from storage
        if (Storage::disk('public')->exists($speciality->speciality_image)) {
            Storage::disk('public')->delete($speciality->speciality_image);
        }

        // Delete the speciality record
        $speciality->delete();

        return redirect()->route('specialities.index')->with('success', 'Speciality deleted successfully.');
    }
}
