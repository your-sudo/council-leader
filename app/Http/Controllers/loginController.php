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
    

    public function function(Request $request)
    {
        $credentials = $request->only('NIS', 'password');

        if (auth()->attempt($credentials) or  auth()->attempt(['nis' == "nis", 'password' == "password"])) {
            return redirect()->intended('dashboard');
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
