<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('plans.list', compact('plans'));
    }
    public function create()
    {
        return view('plans.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'duration' => 'required|string',
            'price' => 'required|string',
            'discount' => 'nullable|string',
            'discount_date' => 'nullable|date',
            'number_appointments' => 'nullable|string',
            'ai_bot' => 'nullable|string',
        ]);
        Plan::create($request->all());
        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
    }
    public function show(Plan $plan)
    {
        return view('plans.show', compact('plan'));
    }
    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'duration' => 'required|string',
            'price' => 'required|string',
            'discount' => 'nullable|string',
            'discount_date' => 'nullable|date',
            'number_appointments' => 'nullable|string',
            'ai_bot' => 'nullable|string',
        ]);
        $plan->update($request->all());
        return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
    }
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
    }
}
