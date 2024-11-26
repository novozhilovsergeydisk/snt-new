<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Log out the user (destroy the session).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function _destroy(Request $request)
    {
        // $data = ['Foo'=>'bar'];
        // return response()->json(['message' => 'Успех!', 'data' => $data]);

        // return response('<h1>Привет, мир!</h1>', 200)->header('Content-Type', 'text/html');

        // return response('Hello World')
        //       ->header('Content-Type', 'text/plain')
        //       ->header('X-Custom-Header', 'Value');


        // Завершение сеанса пользователя
        Auth::logout();

        // Инвалидация текущей сессии
        $request->session()->invalidate();

        // Генерация нового CSRF-токена
        $request->session()->regenerateToken();

        // Перенаправление на главную страницу
        return redirect('/')->with('status', 'Вы успешно вошли в систему!');;
    }
}
