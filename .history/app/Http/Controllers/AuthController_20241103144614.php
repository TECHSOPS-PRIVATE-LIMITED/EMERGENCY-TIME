<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
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
            Auth::login($user);
            return redirect()->route('dasboard')->with('success', 'Account created successfully!');
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
     // Method to send OTP to the user's email
     public function sendOtp()
    {
        $otp = rand(100000, 999999); // Generate a random OTP

        $this->otp = $otp; // Assuming you have an 'otp' field in your users table
        $this->save();

        // Send OTP email
        Mail::to($this->email)->send(new OtpMail($otp)); // Make sure this line is correct
    }
 
     // Method to verify OTP and reset the password
     public function verifyOtp(Request $request)
     {
         // Validate the request
         $request->validate([
             'otp' => 'required|size:6',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         // Check if the provided OTP matches the session OTP
         if ($request->otp !== session('otp')) {
             return back()->withErrors(['otp' => 'The provided OTP is incorrect.']);
         }
 
         // Get the user and reset the password
         $user = User::where('email', $request->email)->first();
         $user->password = Hash::make($request->password);
         $user->save();
 
         // Clear the OTP session
         session()->forget('otp');
 
         return redirect()->route('login')->with('success', 'Password reset successfully!');
     }

      // API-based registration
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
            'user' => $user,
            'token' => $token
        ], 200);
    }


}
