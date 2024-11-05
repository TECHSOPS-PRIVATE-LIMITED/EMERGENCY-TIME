<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Speciality;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    // Display a listing of providers
    public function index()
    {
        $providers = Provider::with('speciality')->get(); 
        return view('providers.index', compact('providers'));
    }

    // Show the form for creating a new provider
    public function create()
    {
        $specialities = Speciality::all(); // Fetch all specialities for the dropdown
        return view('providers.add', compact('specialities'));
    }

    // Store a newly created provider in the database
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:providers,email',
            'phone_number' => 'required|string|unique:providers,phone_number',
            'speciality_id' => 'required|exists:specialities,id',
            'consultation_fee' => 'nullable|numeric',
            'consultation_type' => 'required|in:video,audio,chat,in-person',
            // Add other validation rules as needed
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index')->with('success', 'Provider created successfully.');
    }

    // Display the specified provider's details
    public function show($id)
    {
        $provider = Provider::with('speciality')->findOrFail($id); // Eager load the speciality
        return view('providers.show', compact('provider'));
    }

    // Show the form for editing the specified provider
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $specialities = Speciality::all(); // Fetch all specialities for the dropdown
        return view('providers.edit', compact('provider', 'specialities'));
    }

    // Update the specified provider in the database
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
            // Add other validation rules as needed
        ]);

        $provider->update($request->all());

        return redirect()->route('providers.index')->with('success', 'Provider updated successfully.');
    }

    // Remove the specified provider from the database
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully.');
    }
}
