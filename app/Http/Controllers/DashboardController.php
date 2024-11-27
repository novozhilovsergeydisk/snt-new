<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $authController;

    public function __construct(AuthController $authController)
    {
        $this->authController = $authController;
    }

    public function index(Request $request)
    {
        // Проверяем авторизацию
        if (!$this->authController->someProtectedMethod($request)) {
            return redirect('/login')->with('error', 'Вы должны войти в систему.'); // Перенаправляем на страницу авторизации
        }

        // $last_name = session()->get('last_name');
        // $first_name = session()->get('first_name');

        // dump(session());
        
        return view('dashboard'); // Возвращаем представление dashboard
    }
}