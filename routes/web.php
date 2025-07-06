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
    $jobs = Job::with('employer')->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function() { 
    return view('jobs.create');
});

// Note: Wildcards like '{id}' should appear after other explicit routes. Routes are processed in line-order.
Route::get('/jobs/{id}', function($id) {
    $job = Job::find($id);
    return view ('jobs.show', ['job' => $job]);
}); 

Route::post('/jobs', function(){
    // Currently assumes valid input
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});