<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Mail\OtpMail;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
       // Validate the request data
    $validatedData = $request->validate([
        // Step 1: User Details
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',

        // Step 2: Profile Details
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cnic' => 'required|string|max:15|unique:patients',
        'phone' => 'required|string|max:15',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'gender' => 'required|string|in:male,female,other',
        'dob' => 'required|date',

        // Step 3: Medical Information
        'marital_status' => 'required|string|in:single,married,divorced,widowed',
        'blood_group' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        'allergies' => 'nullable|string',
        'current_medications' => 'nullable|string',
        'chronic_diseases' => 'nullable|string',
    ]);

    // Begin database transaction
    DB::beginTransaction();

    try {
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Handle Profile Picture Upload
        $profilePicPath = null;
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
        }


        // Create Patient
        Patients::create([
            'user_id' => $user->id,
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'blood_group' => $validatedData['blood_group'],
            'marital_status' => $validatedData['marital_status'],
            'cnic' => $validatedData['cnic'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'allergies' => $validatedData['allergies'],
            'current_medications' => $validatedData['current_medications'],
            'chronic_diseases' => $validatedData['chronic_diseases'],
            'profile_pic' => $profilePicPath,
        ]);

        // Commit the transaction
        $user->assignRole('patient');
        DB::commit();

        // Redirect with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e->getMessage(), $e->getTrace()); // Show detailed error
        // Redirect back with error message
        return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
    }
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Check if the user has the 'patient' role
            if ($user->hasRole('patient')) {
                return redirect()->route('client.index'); // Redirect to clientside.index
            }

            // Default redirect for other roles
            return redirect()->intended('dashboard'); // Redirect to dashboard
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

            $patient = Patients::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => $user->id,
            ]);
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
          $token = $user->createToken('token-name')->plainTextToken;

          return response()->json([
              'name' => $user->name,
              'token' => $token
          ], 200);
      }

      public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password changed successfully.'
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
