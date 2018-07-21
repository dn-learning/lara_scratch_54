<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __constructor()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (!auth()->attempt(request(['email','password']))) {
            return back()->withErrors([
                'message' => 'Please input proper credentials'
            ]);
        };

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();
        return view('sessions.create');
    }
}
