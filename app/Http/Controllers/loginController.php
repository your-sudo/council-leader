<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function showloginform()
    {
        if (route('login')) {
            return view('login.login');
        }
        else {
            return redirect()->route('login');
        }
        
    }
    

    public function login(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'NIS' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function signup()
    {
        return view('signup');
    }
}
