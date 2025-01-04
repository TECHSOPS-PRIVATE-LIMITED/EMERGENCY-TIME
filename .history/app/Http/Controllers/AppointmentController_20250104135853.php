<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patients;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with(['patient', 'provider'])->get();
        return view('appointment.list', compact('appointments'));
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
        $patient = Patients::where('user_id', Auth::id())->first();
        if (!$patient) {
            return response()->json([
                'success' => false,
                'message' => 'Patient record not found for the authenticated user.',
            ], 404);
        }
        $validatedData = $request->validate([
            'provider_id' => 'required|exists:providers,id', 
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'provider_id' => $validatedData['provider_id'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Appointment created successfully',
            'data' => $appointment,
        ], 201);
    }

    public function getAppointments(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated.',
            ], 401);
        }

        $patient = Patients::where('user_id', Auth::id())->first();

        if (!$patient) {
            return response()->json([
                'success' => false,
                'message' => 'Patient record not found for the authenticated user.',
            ], 404);
        }
        $upcomingAppointments = Appointment::with(['provider.speciality']) // Eager load provider and speciality
            ->where('patient_id', $patient->id)
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();
        $pastAppointments = Appointment::with(['provider.speciality']) // Eager load provider and speciality
            ->where('patient_id', $patient->id)
            ->where('date', '<', now()->toDateString())
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();

        // Map through appointments and add provider details
        $upcomingAppointments = $upcomingAppointments->map(function ($appointment) {
            $provider = $appointment->provider; // Get the provider of the appointment

            return [
                'id' => $appointment->id,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'provider' => [
                    'full_name' => $provider->full_name,
                    'profile_picture' => $provider->profile_picture ? Storage::url($provider->profile_picture) : null,
                    'speciality' => $provider->speciality->speciality_name ?? null,
                    'experience_years' => $provider->experience_years,
                ],
            ];
        });

        $pastAppointments = $pastAppointments->map(function ($appointment) {
            $provider = $appointment->provider; // Get the provider of the appointment

            return [
                'id' => $appointment->id,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'provider' => [
                    'full_name' => $provider->full_name,
                    'profile_picture' => $provider->profile_picture ? Storage::url($provider->profile_picture) : null,
                    'speciality' => $provider->speciality->speciality_name ?? null,
                    'experience_years' => $provider->experience_years,
                ],
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Appointments retrieved successfully.',
            'data' => [
                'upcoming' => $upcomingAppointments,
                'past' => $pastAppointments,
            ],
        ], 200);
    }

    public function approval($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.approval', compact('appointment'));
    }

}
