<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterPostController extends Controller
{
    public function store(Request $request)
    {
        // Валидация входных данных
        $validator = Validator::make($request->all(), [
            'plot' => 'required|integer',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422); // Unprocessable Entity
        }

        // Получаем данные из запроса
        $plot = $request->input('plot');
        $email = $request->input('email');
        $password = $request->input('password');

        // Сохраняем пользователя в базе данных
        DB::table('users')->insert([
            'name' => $plot,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Регистрация успешна!'], 201); // Created
    }
}

