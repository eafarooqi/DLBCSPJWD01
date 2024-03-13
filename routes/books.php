<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Books Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for the My Collection section of the
| application. Routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web", "auth" & "verified" middleware.
|
*/

// Books Routes
Route::get('/', [BookController::class, 'index'])->name('books');
Route::resource('books', 'App\Http\Controllers\BookController');
