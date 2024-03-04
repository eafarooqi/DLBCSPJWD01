<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manage Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for the manage section of the
| application. Routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web", "auth" & "verified" middleware.
|
*/

// Genre Routes
Route::resource('genres', 'GenreController');

require __DIR__.'/auth.php';
