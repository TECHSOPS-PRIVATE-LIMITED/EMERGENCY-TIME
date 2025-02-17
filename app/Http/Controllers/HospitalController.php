<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientside.hospitals.index');
    }

    public function getHospitals(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'radius' => 'nullable|numeric|max:100000',
        ]);

        $lat = $request->lat;
        $lng = $request->lng;
        $radius = $request->radius ?? 100000;

        $client = new Client();

        try {
            $response = $client->get('https://maps.googleapis.com/maps/api/place/nearbysearch/json', [
                'query' => [
                    'location' => "$lat,$lng",
                    'radius' => $radius,
                    'type' => 'hospital',
                    'key' => env('GOOGLE_MAPS_API_KEY')
                ]
            ]);

            return response()->json(json_decode($response->getBody(), true));
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'error_message' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
