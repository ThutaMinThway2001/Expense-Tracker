<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('Register.register');
    }

    public function store()
    {
        $credentials = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $user = User::create($credentials);

        auth()->login($user);

        return redirect('/');
    }
}
