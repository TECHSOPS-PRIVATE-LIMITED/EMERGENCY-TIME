<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of countries.
     */
    public function index()
    {
        $countries = Country::all();
        return view('countries.list', compact('countries'));
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
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('countries', $request->file('image'));
        }

        Country::create([
            'country_code' => $request->country_code,
            'country_name' => $request->country_name,
            'image' => $imagePath,
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
        if ($request->hasFile('image')) {
            if ($country->image && Storage::disk('public')->exists($country->image)) {
                Storage::disk('public')->delete($country->image);
            }

            $imagePath = Storage::disk('public')->put('countries', $request->file('image'));
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
        if ($country->image && Storage::disk('public')->exists($country->image)) {
            Storage::disk('public')->delete($country->image);
        }
        $country->delete();
        return redirect()->back()->with('success', 'Country deleted successfully!');
    }

    public function countryapi()
    {
        $countries = Country::all()->map(function ($country) {
            return [
                'id' => $country->id,
                'country_code' => $country->country_code,
                'country_name' => $country->country_name,
                'image_url' => $country->image ? asset('storage/' . $country->image) : null,
                'created_at' => $country->created_at,
                'updated_at' => $country->updated_at,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $countries,
        ]);
    }
}
