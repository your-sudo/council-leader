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

Route::get('/', 'PagesController@index' );
Route::get('/about', function () {
    return view("pages.about");
});
Route::get('/index', function () {
    return view("pages.index");
});

Route::get('/pilih', function () {
    return view("pages.dashboard");
});

