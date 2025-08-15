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
    Route::post('/votesubmit', [votingController::class, 'submitVote'])->name('votesubmit');      
      Route::get('/logout', [loginController::class, 'logout'])->name('logout');


});

Route::middleware('admin')->group(function () {
    Route::get('/dashboardadmin', [adminController::class, 'dashboardadmin'])->name('dashboardadmin');
    Route::get('/tambahkandidat', [adminController::class, 'tambahKandidatForm'])->name('tambahkandidat');
    Route::post('/tambahkandidat', [adminController::class, 'tambahKandidat']);
    Route::get('/manajemenkandidat', [adminController::class, 'showManajemenKandidat'])->name('manajemenkandidat');
    Route::get('/manajemenSiswa', [adminController::class, 'showManajemenSiswa'])->name('manajemenSiswa');
    Route::get('/hapusKandidat/{id}', [adminController::class, 'deletePaslon'])->name('hapusKandidat');
    Route::get('/editKandidat/{id}', [adminController::class, 'showEditKandidatForm'])->name('editKandidat');
    Route::post('/editKandidat/{id}', [adminController::class, 'editKandidat']);
    Route::get('/manajemenSiswa', [adminController::class, 'showManajemenSiswa'])->name('manajemenSiswa');

});
Route::post('/logout', [loginController::class, 'logout']);
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    if (auth()->check() ) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboardadmin');
        } else {
            return redirect()->route('dashboard');
        }
    }
    return redirect()->route('login');

});




