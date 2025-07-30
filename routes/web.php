<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
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

Route::get('/', [loginController::class, 'showloginform'])->name('login');

Route::get('/about', function () {
    return view("pages.about");
});
Route::get('/login', [loginController::class, 'showloginform'])->name('login');

Route::post('/login', [loginController::class, 'function'])->name('login.post');

Route::middleware('auth')->group(function () {
   
    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
});

 Route::get('/dashboard', function () {
    return view('login.dashboard');
    })->name('dashboard');



