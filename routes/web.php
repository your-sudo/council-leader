<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\lupapassword;



Route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
    Route::post('/register', [loginController::class, 'register'])->name('register');
    Route::get('/lupapassword', [lupapassword::class, 'showForgotPasswordForm'])->name('lupapassword');
    Route::post('/lupapassword', [lupapassword::class, 'forgotPassword']);

});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('login.dashboard'); 
    })->name('dashboard');
    Route::get('/dashboardadmin', function () {
        return view('adminPage.dashboardAdmin'); 
    })->name('dashboardadmin');
    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/about', function () {
    return view("pages.about");
});
