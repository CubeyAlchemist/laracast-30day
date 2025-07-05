<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
});
// Can return same views from multiple get requests
Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/teams', function() {
    return view('teams');
});