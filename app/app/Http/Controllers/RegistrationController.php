<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    public function store()
    {
        // new user validation
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // saving new user
        $user = User::create(
            ['name'=>request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))]
        );

        // loging in new user
        auth()->login($user);

        // redirect
        //return redirect('/');
        return redirect()->home(); // redirect to named page
    }
}
