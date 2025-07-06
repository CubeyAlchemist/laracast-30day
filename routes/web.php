<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Automatically registers all 7 default routes
//      (index, create, store, show, edit, update, destroy)
Route::resource('jobs', JobController::class);