<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function someProtectedMethod(Request $request)
    {
        // Получаем токены из сессии и куки
        $sessionToken = $request->session()->get('token');
        $cookieToken = $request->cookie('auth_token');

        // Проверка наличия токенов и их совпадения
        if (!$sessionToken || !$cookieToken || $sessionToken !== $cookieToken) {
            return false; // Токены не совпадают
        }

        return true; // Токены совпадают
    }
}
