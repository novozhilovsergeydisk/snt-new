<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main', ["message"=>"main"]);
});

Route::get('/contacts', function () {
    return view('contacts', ["message"=>"contacts"]);
});

Route::get('/billboard', function () {
    return view('billboard', ["message"=>"billboard"]);
});

Route::get('/login', function () {
    return view('login', ["message"=>"login"]);
});

//Route::get('/', function () {
//    return view('welcome');
//});
