<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\FeedbackController;

Route::get('/user', function (Request $request) {
         return $request->user();
})->middleware('auth:sanctum');
Route::post('registerApi', [AuthController::class, 'registerApi']);
Route::post('loginApi', [AuthController::class, 'loginApi']);

Route::post('/change-password', [AuthController::class, 'changePassword'])->middleware('auth:sanctum');
// Countries API's
Route::get('/countrieslist', [CountriesController::class, 'countryapi'])->middleware('auth:sanctum');
// Speciallities API's
Route::get('/specialitieslist', [SpecialityController::class, 'getSpecialities'])->middleware('auth:sanctum');
// Providers API's
Route::get('/get-providers', [ProviderController::class, 'getProviders'])->middleware('auth:sanctum');
// Feed Back API
Route::post('/feedback', [FeedbackController::class, 'storeFeedback'])->middleware('auth:sanctum');
Route::get('/patients-providers', [SpecialityController::class, 'getPatientsAndProviders'])->middleware('auth:sanctum');

Route::post('/appointments', [AppointmentController::class, 'storeAppointments'])->middleware('auth:sanctum');

Route::get('/my-appointments', [AppointmentController::class, 'getAppointments'])->middleware('auth:sanctum');

Route::get('/replicate-token', [FeedbackController::class, 'sendReplicateToken'])->middleware('auth:sanctum');