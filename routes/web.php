<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function() {
    return view('home', [
        'greeting' => 'Hello'
    ]);
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

Route::get('/jobs', function() {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function($id) {
    $job = Job::find($id);
    // Laravel reports it cannot find 'job' view, despite existing, and working as expected.
    return view ('job', ['job' => $job]);
});