<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('authentications.login'); 
    }
    public function showRegistrationForm()
    {
        return view('authentications.register'); 
    }
    public function showForgotPasswordForm()
    {
        return view('authentications.forgot'); 
    }
    public function showResetPasswordForm(Request $request, $token)
    {
        return view('authentications.reset', ['token' => $token, 'email' => $request->email]); 
    }
    
    
        public function register(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'User registered successfully.');
        }


    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended('dashboard'); 
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput();
        }
    }
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? response()->json(['message' => 'Password reset link sent'])
                    : response()->json(['message' => 'Failed to send reset link'], 400);
    }

            public function logout(Request $request)
        {
            Auth::logout(); 
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('success', 'You have been logged out successfully.');
        }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? response()->json(['message' => 'Password reset successful'])
                    : response()->json(['message' => 'Failed to reset password'], 400);
    }
}
