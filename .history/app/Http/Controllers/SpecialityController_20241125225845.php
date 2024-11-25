<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = Speciality::with('country')->get();
        $countries = Country::all();
        return view('specialities.list', compact('specialities'));
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
}
