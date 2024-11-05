<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;


Route::get('/clientside', [ClientController::class, 'index'])->name('client.index');