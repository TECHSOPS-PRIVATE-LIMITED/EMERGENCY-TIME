<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PatientsController extends Controller
{
    public function index()
    {
        
        return view('patients.index'); 
    }
    public function create()
    {
        return view('patients.create'); 
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255',
            'profile_status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $patient = new Patient();
        $patient->user_id = $request->user_id;
        $patient->name = $request->name;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->email = $request->email;
        $patient->city = $request->city;
        $patient->country = $request->country;
        $patient->birth_place = $request->birth_place;
        $patient->identity_no = $request->identity_no;
        $patient->profile_status = $request->profile_status;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('patients_images', 'public');
            $patient->image = $imagePath;
        }

        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    // Display the specified patient.
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient')); // Return patient details
    }

    // Show the form for editing the specified patient.
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient')); // Return edit form with patient data
    }

    // Update the specified patient in storage.
    public function update(Request $request, $id)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255',
            'profile_status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find patient to update
        $patient = Patient::findOrFail($id);
        $patient->user_id = $request->user_id;
        $patient->name = $request->name;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->email = $request->email;
        $patient->city = $request->city;
        $patient->country = $request->country;
        $patient->birth_place = $request->birth_place;
        $patient->identity_no = $request->identity_no;
        $patient->profile_status = $request->profile_status;

        // Handle image upload (if any)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('patients_images', 'public');
            $patient->image = $imagePath;
        }

        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Remove the specified patient from storage.
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
