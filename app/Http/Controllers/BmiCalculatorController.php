<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientside.bmi.index');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'age'    => 'required|numeric|min:2|max:120',
            'gender' => 'required|in:male,female',
            'unit'   => 'required|in:metric,imperial',
        ]);

        if ($validated['unit'] == 'metric') {
            $weight = $validated['weight'];
            $height = $validated['height'] / 100; // Convert cm to meters
        } else {
            $weight = $validated['weight'] * 0.453592; // Convert pounds to kg
            $height = $validated['height'] * 0.0254;   // Convert inches to meters
        }

        $bmi = $weight / ($height * $height);

        // Calculate ideal weight range based on height and gender
        $idealWeightLow  = $this->calculateIdealWeight($height, $validated['gender'], 'low');
        $idealWeightHigh = $this->calculateIdealWeight($height, $validated['gender'], 'high');

        // Get category and health insights
        $category       = $this->getBmiCategory($bmi);
        $healthInsights = $this->getHealthInsights($bmi, $validated['age'], $validated['gender']);

        return view('clientside.bmi.index', [
            'bmi'             => round($bmi, 2),
            'category'        => $category,
            'weight'          => $validated['weight'],
            'height'          => $validated['height'],
            'age'             => $validated['age'],
            'gender'          => $validated['gender'],
            'unit'            => $validated['unit'],
            'idealWeightLow'  => round($idealWeightLow, 1),
            'idealWeightHigh' => round($idealWeightHigh, 1),
            'healthInsights'  => $healthInsights,
        ]);
    }

    private function getBmiCategory($bmi)
    {
        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return 'Normal weight';
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 'Overweight';
        } else {
            return 'Obesity';
        }
    }

    private function calculateIdealWeight($height, $gender, $range)
    {
                                                           // Using the Hamwi formula
        $baseHeight  = $gender === 'male' ? 152.4 : 152.4; // 5 feet in cm
        $weightPerCm = $gender === 'male' ? 2.7 : 2.2;     // kg per cm
        $baseWeight  = $gender === 'male' ? 48 : 45;       // kg

        $heightDiff  = ($height * 100) - $baseHeight;
        $idealWeight = $baseWeight + ($heightDiff * $weightPerCm / 2.54);

        return $range === 'low' ? $idealWeight * 0.9 : $idealWeight * 1.1;
    }

    private function getHealthInsights($bmi, $age, $gender)
    {
        $insights = [];

        // Age-specific insights
        if ($age < 18) {
            $insights[] = "BMI calculations for individuals under 18 should be evaluated against age-specific growth charts.";
        } elseif ($age > 65) {
            $insights[] = "For older adults, a slightly higher BMI (between 25-27) may be beneficial.";
        }

        // Gender-specific insights
        if ($gender === 'female') {
            $insights[] = "Women naturally have a higher percentage of essential body fat compared to men.";
            if ($age > 50) {
                $insights[] = "Post-menopausal women should pay special attention to maintaining healthy bone density through diet and exercise.";
            }
        } else {
            $insights[] = "Men typically have more muscle mass, which may affect BMI calculations.";
        }

        // BMI-specific insights
        if ($bmi < 18.5) {
            $insights[] = "Being underweight may affect your immune system and energy levels.";
        } elseif ($bmi >= 25 && $bmi < 30) {
            $insights[] = "Moderate weight loss through healthy diet and regular exercise can improve your health markers.";
        } elseif ($bmi >= 30) {
            $insights[] = "Consider consulting with healthcare professionals about a personalized weight management plan.";
        }

        return $insights;
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
