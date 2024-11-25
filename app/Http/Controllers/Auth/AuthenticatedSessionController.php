<?php

namespace App\Http\Controllers\Auth;

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
    public function destroy(Request $request)
    {
        // Завершение сеанса пользователя
        Auth::logout();

        // Инвалидация текущей сессии
        $request->session()->invalidate();

        // Генерация нового CSRF-токена
        $request->session()->regenerateToken();

        // Перенаправление на главную страницу
        return redirect('/');
    }
}
