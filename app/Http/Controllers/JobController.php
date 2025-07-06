<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(5);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create() 
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view ('jobs.show', ['job' => $job]);
    }

    public function store()
    {
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
    }

    public function edit(Job $job)
    {
        return view ('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // Authorise - TODO
        
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('jobs/'.$job->id);
    }

    public function destroy(Job $job)
    {
        // Authorise - TODO
        $job->delete();
        return redirect('/jobs');
    }
}
