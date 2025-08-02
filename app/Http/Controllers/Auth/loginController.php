<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'nama_ibu' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('NIS', $request->nis)->first();

        if (!$user) {
            return back()->withErrors(['nis' => 'NIS tidak terdaftar.'])->withInput();
        }

        if (strtolower($user->nama_ibu) !== strtolower($request->nama_ibu)) {
            return back()->withErrors(['nama_ibu' => 'Nama Ibu Kandung tidak sesuai.'])->withInput();
        }

        if (!is_null($user->password)) {
            return back()->withErrors(['nis' => 'Akun ini sudah memiliki password. Silakan login.'])->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);
        return redirect('/dashboard');
    }

   public function login(Request $request)
    {
        $credentials = $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['NIS' => $credentials['nis'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nis' => 'NIS atau Password yang Anda masukkan salah.',
        ])->onlyInput('nis');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
