<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\OpenLibraryController;
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

// Open Library Routes
Route::get('/ol-search', [OpenLibraryController::class, 'index'])->name('ol-search');
Route::post('/ol-search', [OpenLibraryController::class, 'search'])->name('ol-search');
