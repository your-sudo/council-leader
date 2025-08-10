<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\lupapassword;
use App\Http\Controllers\voting\votingController;
use App\Http\Controllers\admin\adminController;



Route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
    Route::post('/register', [loginController::class, 'register'])->name('register');
    Route::get('/lupapassword', [lupapassword::class, 'showForgotPasswordForm'])->name('lupapassword');
    Route::post('/lupapassword', [lupapassword::class, 'forgotPassword']);

});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[votingController::class, 'kandidat'])->name('dashboard');
    Route::get('/dashboardadmin', [adminController::class, 'dashboardadmin'])->name('dashboardadmin');
    Route::post('/votesubmit', [votingController::class, 'submitVote'])->name('votesubmit');
    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
    Route::get('/tambahkandidat', [adminController::class, 'tambahKandidatForm'])->name('tambahkandidat');
     Route::get('/manajemenkandidat', [adminController::class, 'showManajemenKandidat'])->name('manajemenkandidat');
    Route::post('/tambahkandidat', [adminController::class, 'tambahKandidat'])->name('tambahkandidatsubmit');
        Route::get('/logout', [loginController::class, 'logout'])->name('logout');

});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});


