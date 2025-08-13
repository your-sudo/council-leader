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
        public function showForgotPasswordForm()
    {
        return view('login.resetpass');
    }


    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'nama_ibu' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('nis', $request->nis)->first();

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

        $user = User::where('nis', $credentials['nis'])->first();

        if (Auth::attempt(['nis' => $credentials['nis'], 'password' => $credentials['password']])) {
            
            if ($user->role === 'user') {
                $request->session()->regenerate();
                 $user = Auth::user();
                return redirect()->intended('dashboard');
            }
            

            if ($user->role === 'admin') {
                $request->session()->regenerate();
                $user = Auth::user();
                return redirect()->intended('dashboardadmin');
        }
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
