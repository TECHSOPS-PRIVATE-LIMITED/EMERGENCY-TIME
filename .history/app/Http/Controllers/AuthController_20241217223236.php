<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Patients;
use App\Mail\OtpMail;
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
    public function showProviderForm()
    {
        return view('authentications.provider'); 
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        $user = new User();
        $user->name = $validatedData['first_name'] . ' ' . $validatedData['last_name']; 
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); 
        $user->save();


        $patient = new Patients();
        $patient->name = $user->name;
        $patient->email = $user->email;
        $patient->user_id = $user->id; 
        $patient->profile_status = 0; 
        $patient->save();
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
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
        public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999);
        $user->otp = $otp; 
        $user->save();
        Mail::to($user->email)->send(new OtpMail($otp));
        session(['otp_email' => $user->email]); 
        return back()->with('success', 'OTP sent to your email address!');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|size:6',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::where('email', session('otp_email'))->first();
        if (!$user || $request->otp != $user->otp) {
            return back()->withErrors(['otp' => 'The provided OTP is incorrect.']);
        }
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->save();
        session()->forget('otp_email');
        return redirect()->route('login')->with('success', 'Password reset successfully!');
    }


      public function registerApi(Request $request)
      {
          $validator = Validator::make($request->all(), [
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:8|confirmed',
          ]);
  
          if ($validator->fails()) {
              return response()->json(['errors' => $validator->errors()], 422);
          }
  
          $user = User::create([
              'name' => $request->name,
              'email' => $request->email,
              'password' => Hash::make($request->password),
          ]);
  
          // Create a token for the user
          $token = $user->createToken('authToken')->plainTextToken;
  
          return response()->json([
              'message' => 'User registered successfully.',
              'user' => $user,
              'token' => $token
          ], 201);
      }
  
      public function loginApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
       
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

            $user = Auth::user();
            $token = $user->createToken('token-name');

        return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login'); 
    }

}
