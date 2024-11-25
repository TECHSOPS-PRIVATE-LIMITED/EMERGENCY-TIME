<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\SpecialityController;

Route::get('/user', function (Request $request) {
         return $request->user();
})->middleware('auth:sanctum');

Route::post('registerApi', [AuthController::class, 'registerApi']);
Route::post('loginApi', [AuthController::class, 'loginApi']);


// Countries API's
Route::get('/countrieslist', [CountriesController::class, 'countryapi'])->middleware('auth:sanctum');

// Speciallities API's
Route::get('specialities', [SpecialityController::class, 'getSpecialities']);