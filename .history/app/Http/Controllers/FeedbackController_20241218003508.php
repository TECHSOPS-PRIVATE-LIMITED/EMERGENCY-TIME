<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;


class FeedbackController extends Controller
{
    public function storeFeedback(Request $request)
{
    $validated = $request->validate([
        'feedback' => 'required|string|max:255',
    ]);
    Feedback::create([
        'user_id' => Auth::id(), 
        'feedback' => $validated['feedback'], 
    ]);
    return response()->json([
        'message' => 'Feedback submitted successfully.',
    ]);
}
}
