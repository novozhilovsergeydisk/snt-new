<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

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

Route::post('/login', 'LoginPostController@store');

Route::get('/foo', 'FooController@index');

Route::post('/foo', 'FooPostController@store');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


