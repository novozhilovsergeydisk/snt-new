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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooController;

// Отображение формы
Route::get('/foo', [FooController::class, 'showForm'])->name('foo.form');

Route::post('/foo', 'FooController@handlePost');


// Обработка POST-запроса
// Route::post('/foo', 'FooController@method');

//Route::get('/', function () {
//    return view('welcome');
//});

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



Route::post('/login', function (Illuminate\Http\Request $request) {
    $email = $request->input('email'); // Извлечение email
    $password = $request->input('password'); // Извлечение password

    // Проверка данных
    if ($email === 'admin@example.com' && $password === 'password') {
        return response()->json(['message' => 'Login successful!']);
    } else {
        return response()->json(['message' => 'Invalid credentials!'], 401);
    }
});

