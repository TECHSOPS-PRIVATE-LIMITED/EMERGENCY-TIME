<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountriesController;


Route::get('/user', function (Request $request) {
         return $request->user();
})->middleware('auth:sanctum');

Route::post('registerApi', [AuthController::class, 'registerApi']);
Route::post('loginApi', [AuthController::class, 'loginApi']);

Route::get('/countries', [CountriesController::class, 'index']);