<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patients;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with(['patient', 'provider'])->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patients::all();
        $providers = Provider::all();
        return view('appointments.create', compact('patients', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'provider_id' => 'required|exists:providers,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patients::all();
        $providers = Provider::all();
        return view('appointments.edit', compact('appointment', 'patients', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'provider_id' => 'required|exists:providers,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }


    public function storeAppointments(Request $request)
    {
        // Get the patient_id from the patients table where user_id matches the authenticated user's ID
        $patient = Patients::where('user_id', Auth::id())->first();

        // Check if the patient record exists
        if (!$patient) {
            return response()->json([
                'success' => false,
                'message' => 'Patient record not found for the authenticated user.',
            ], 404);
        }

        // Validate the incoming request
        $validatedData = $request->validate([
            'provider_id' => 'required|exists:providers,id', // Ensure the provider_id exists in the providers table
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Create the appointment with the patient_id included
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'provider_id' => $validatedData['provider_id'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
        ]);

        // Return the response
        return response()->json([
            'success' => true,
            'message' => 'Appointment created successfully',
            'data' => $appointment,
        ], 201);
    }

}
