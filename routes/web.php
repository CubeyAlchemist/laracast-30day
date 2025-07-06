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

// Index
Route::get('/jobs', function() {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function() { 
    return view('jobs.create');
});

// Show
// Note: Wildcards like '{id}' should appear after other explicit routes. Routes are processed in line-order.
Route::get('/jobs/{id}', function($id) {
    $job = Job::find($id);
    return view ('jobs.show', ['job' => $job]);
}); 

// Store
Route::post('/jobs', function(){
    // Validate inputs. On fail, automatically returns to form page and sends info on errors.
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // Only runs if validation was successful.
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function($id) {
    $job = Job::find($id);
    return view ('jobs.edit', ['job' => $job]);
}); 

// Update
Route::patch('/jobs/{id}', function($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // Authorise - TODO

    $job = Job::findOrFail($id);    // gets the ID or 'fails' if unable to locate, preventing further execution
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('jobs/'.$job->id);
}); 

// Destroy
Route::delete('/jobs/{id}', function($id) {
    // Authorise - TODO
    $job = Job::findOrFail($id);    // gets the ID or 'fails' if unable to locate, preventing further execution
    $job->delete();
    return redirect('/jobs');
}); 