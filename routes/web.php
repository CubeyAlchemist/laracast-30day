<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

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
        'jobs' => [
            ['id' => 1, 'title' => 'Director', 'salary' => 60000],
            ['id' => 2, 'title' => 'Programmer', 'salary' => 20000],
            ['id' => 3, 'title' => 'Teacher', 'salary' => 40000]
        ]
    ]);
});

Route::get('/jobs/{id}', function($id) {
    $jobs = [
        ['id' => 1, 'title' => 'Director', 'salary' => 60000],
        ['id' => 2, 'title' => 'Programmer', 'salary' => 20000],
        ['id' => 3, 'title' => 'Teacher', 'salary' => 40000]
    ];
    $job = collect($jobs)->first(fn($job) => $job['id'] == $id);

    if (!$job) {
        abort(404);
    }

    // Laravel reports it cannot find 'job' view, despite existing, and working as expected.
    return view ('job', ['job' => $job]);
});