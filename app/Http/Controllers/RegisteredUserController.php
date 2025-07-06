<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // // Validate inputs. On fail, automatically returns to form page and sends info on errors.
        // request()->validate([
        //     'first_name' => ['required'],
        //     'last_name' => ['required'],
        //     'email' => ['required', 'email'],
        //     'password' => ['required', 'min:8', '']
        // ]);

        // // Only runs if validation was successful.
        // Job::create([
        //     'title' => request('title'),
        //     'salary' => request('salary'),
        //     'employer_id' => 1
        // ]);
        return redirect('/');
    }
}
