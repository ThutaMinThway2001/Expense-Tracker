<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('Session.login');
    }

    public function store()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            session()->regenerate();

            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('loginCreate');
    }
}
