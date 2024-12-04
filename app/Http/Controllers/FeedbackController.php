<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;


class FeedbackController extends Controller
{
    public function storeFeedback(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'feedback' => 'required|string|max:255',
    ]);

    // Create the feedback
    Feedback::create([
        'user_id' => Auth::id(), // Assuming the user is authenticated
        'feedback' => $validated['feedback'], // Note: Column is 'feebback' as per your schema
    ]);

    // Return response
    return response()->json([
        'message' => 'Feedback submitted successfully.',
    ]);
}
}
