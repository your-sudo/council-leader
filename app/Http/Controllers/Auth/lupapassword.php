<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;                   

class lupapassword extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('login.resetpass');
    }

    public function forgotPassword(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'nis' => 'required|string',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::where('NIS', $request->nis)->first();

    if ($user && strtolower($user->nama) === strtolower($request->nama)) {
        
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Password Anda telah berhasil direset! Silakan login.');
    }

    return back()->withErrors(['nis' => 'Kombinasi NIS dan Nama tidak cocok.'])->withInput();
}
}