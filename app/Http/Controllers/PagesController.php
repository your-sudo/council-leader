<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PagesController extends Controller
{
    public function index(){
        return redirect()->route(
            'login'
        );
    }

    public function autentikasi(Request $request): RedirectResponse {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('   /pilih')
                ->with('success', 'Login successful');
        }

        return redirect()->back()->withErrors([
            'username' => 'Invalid NIS atau Password',
        ]);
    }

}
?>
