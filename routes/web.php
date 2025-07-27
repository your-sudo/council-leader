<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return 'welcome';
// });

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);

Route::get('/about', function () {
    return view("pages.about");
});
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
});


Route::get('/pilih', function () {
    return view("pages.dashboard");
})->middleware('autentikasi')->name('pilih');

