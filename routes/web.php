<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthSessionController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::post('/logout', [AuthenticatedSessionController::class, '_destroy'])->name('logout');

Route::post('/logout', 'AuthenticatedSessionController@_destroy')->name('logout');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Route::post('/logout', 'AuthenticatedController@_destroy')->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('main', ["message"=>"main"]);
});

// Другие маршруты...

// Route::get('/protected', 'AuthController@someProtectedMethod')->name('protected');

Route::get('/protected', [AuthController::class, 'someProtectedMethod'])->name('protected');

Route::get('/contacts', function () {
    return view('contacts', ["message"=>"contacts"]);
});

Route::get('/billboard', function () {
    return view('billboard', ["message"=>"billboard"]);
});

Route::get('/login', 'LoginController@index')->name('login');

Route::get('/logout', function () {
    return view('main', ["message"=>"main"]);
});

//Route::get('/login', function () {
////    dd('login');
//    return view('login', ["message"=>"login"]);
//});

Route::post('/login', 'LoginPostController@auth');

Route::get('/foo', 'FooController@index');
Route::post('/foo', 'FooPostController@store');


