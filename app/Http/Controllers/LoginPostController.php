<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LoginPostController extends Controller
{
    public function store(Request $request)
    {
        // Выполняем валидацию вручную
        $validationResult = $this->validateInput($request->all());

        // Получаем email из запроса
        $email = $request->input('email');
        $password = $request->input('password');

        dump($validationResult['status']);
        dump('$2y$10$nmb9oRQ3p5meyCcA9Ne4n.nixM7LYCifUXAbNBmF9WoCWYLnJiEZG');

// Проверяем, существует ли пользователь с таким email
$user = DB::table('users')->where('id', 1)->first();
// $user = DB::table('users')->where('email', $email)->first();

        dump($user);

        dd(bcrypt('proxima'));
        // dd($validationResult);
        // Если валидация не прошла, возвращаем JSON с ошибками
        if ($validationResult['status'] === 'error') {
            // return redirect()->route('login')->with('error', 'Error!');
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'errors' => $validationResult['errors'],
            ], 422); // HTTP статус 422 Unprocessable Entity
        } else {
            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        }

        // Возвращаем успешный ответ
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful!',
            'data' => $validationResult['data'],
        ]);
    }

    private function show_bcrypt()
	{
		return bcrypt('joker_579');
    }

    public function handleLogin(Request $request) {
        // Предположим, что message передается из формы или генерируется внутри метода.
        $message = $request->input('message', ''); // Получаем значение 'message', по умолчанию пустая строка.

        // Проверяем значение 'message'.
        if ($message === 'Login successful!') {
            // Выполняем редирект на нужную страницу с успешным сообщением.
            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        }

        // В противном случае редиректим обратно с ошибкой.
        return redirect()->back()->with('error', 'Login failed. Please try again.');
    }

    private function validateInput(array $data)
    {
        $errors = [];

        // Проверка Участка
        if (empty($data['email'])) {
            $errors['email'][] = 'Заполните поле участок';
        }  elseif (strlen($data['email']) > 255) {
            $errors['email'][] = 'The email may not be greater than 255 characters.';
        }
        
        // // Проверка email
        // if (empty($data['email'])) {
        //     $errors['email'][] = 'The email field is required.';
        // } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        //     $errors['email'][] = 'The email must be a valid email address.';
        // } elseif (strlen($data['email']) > 255) {
        //     $errors['email'][] = 'The email may not be greater than 255 characters.';
        // }

        // Проверка пароля
        if (empty($data['password'])) {
            $errors['password'][] = 'The password field is required.';
        } elseif (strlen($data['password']) < 6) {
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
