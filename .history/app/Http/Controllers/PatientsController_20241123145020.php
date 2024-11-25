<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User; // Assuming User model exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; // For creating user password

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.list', compact('patients'));
    }

    public function create()
    {
        return view('patients.add');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|string|min:8',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255|unique:patients,email',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255|unique:patients,identity_no',
            'profile_status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create user first
        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
        ]);

        // Create patient
        $patient = new Patient();
        $patient->user_id = $user->id;
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255|unique:patients,email,' . $id,
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255|unique:patients,identity_no,' . $id,
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

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
