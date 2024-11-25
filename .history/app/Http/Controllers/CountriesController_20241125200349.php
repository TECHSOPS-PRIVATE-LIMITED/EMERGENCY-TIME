<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of countries.
     */
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    /**
     * Store a newly created country in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_code' => 'required|string|max:5|unique:countries,country_code',
            'country_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('countries', 'public');
        }

        Country::create([
            'country_code' => $request->country_code,
            'country_name' => $request->country_name,
            'image' => $imagePath ?? null,
        ]);

        return redirect()->back()->with('success', 'Country added successfully!');
    }

    /**
     * Display the specified country.
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    /**
     * Update the specified country in storage.
     */
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $request->validate([
            'country_code' => 'sometimes|required|string|max:5|unique:countries,country_code,' . $country->id,
            'country_name' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('countries', 'public');
            $country->image = $imagePath;
        }

        $country->update([
            'country_code' => $request->country_code ?? $country->country_code,
            'country_name' => $request->country_name ?? $country->country_name,
        ]);

        return redirect()->back()->with('success', 'Country updated successfully!');
    }

    /**
     * Remove the specified country from storage.
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        // Delete image file if exists
        if ($country->image && \Storage::exists('public/' . $country->image)) {
            \Storage::delete('public/' . $country->image);
        }

        $country->delete();

        return redirect()->back()->with('success', 'Country deleted successfully!');
    }
}
