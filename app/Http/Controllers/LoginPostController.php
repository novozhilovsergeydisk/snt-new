<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPostController extends Controller
{
    public function store(Request $request)
    {
        // Выполняем валидацию вручную
        $validationResult = $this->validateInput($request->all());

        // Если валидация не прошла, возвращаем JSON с ошибками
        if ($validationResult['status'] === 'error') {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validationResult['errors'],
            ], 422); // HTTP статус 422 Unprocessable Entity
        }

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Login successful!',
            'data' => $validationResult['data'],
        ]);
    }

    private function validateInput(array $data)
    {
        $errors = [];
        
        // Проверка email
        if (empty($data['email'])) {
            $errors['email'][] = 'The email field is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'][] = 'The email must be a valid email address.';
        } elseif (strlen($data['email']) > 255) {
            $errors['email'][] = 'The email may not be greater than 255 characters.';
        }

        // Проверка пароля
        if (empty($data['password'])) {
            $errors['password'][] = 'The password field is required.';
        } elseif (strlen($data['password']) < 8) {
            $errors['password'][] = 'The password must be at least 8 characters.';
        } elseif (strlen($data['password']) > 100) {
            $errors['password'][] = 'The password may not be greater than 100 characters.';
        }

        // Если есть ошибки, возвращаем их
        if (!empty($errors)) {
            return ['status' => 'error', 'errors' => $errors];
        }

        // Если все проверки пройдены, возвращаем валидированные данные
        return ['status' => 'success', 'data' => $data];
    }
}
