<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = Speciality::all();
        return view('speciallities.list', compact('specialities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'speciality_name' => 'required|string|max:255',
            'speciality_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = $request->file('speciality_image')->store('specialities', 'public');
        Speciality::create([
            'speciality_name' => $request->speciality_name,
            'speciality_image' => $imagePath,
        ]);

        return redirect()->route('specialities.index')->with('success', 'Speciality added successfully.');
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
