<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\ProviderController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/providerregister', [AuthController::class, 'showProviderForm'])->name('provider.show');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/reset/request', [AuthController::class, 'sendOtp'])->name('password.reset.request');
Route::post('/password/reset/verify', [AuthController::class, 'verifyOtp'])->name('password.reset.verify');

// PLANS ROUTES
Route::resource('plans', PlanController::class);
// SPECIALLITY ROUTES
Route::resource('specialities', SpecialityController::class);
// PROVIDER ROUTES
Route::resource('providers', ProviderController::class);



Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboards.dashboard');
})->name('dashboard');
