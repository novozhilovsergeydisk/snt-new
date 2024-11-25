<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class LoginPostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // Выполняем валидацию вручную
        $validationResult = $this->validateInput($data);

//        dd($validationResult);

        // Если валидация не прошла, возвращаем JSON с ошибками
        if ($validationResult['status'] === 'error') {
//            return redirect()->route('dashboard')->with('success', 'Welcome back!');
            return view('login')->with('error', $validationResult['error']);;

//            return redirect()->route('login')->with('error', 'Error!');


//            return response()->json([
//                'status' => 'failed',
//                'message' => 'Validation failed',
//                'errors' => $validationResult['errors'],
//            ], 422); // HTTP статус 422 Unprocessable Entity
        } else {
            // Получаем plot из запроса
            $plot = $validationResult['data']['plot']; // $request->input('plot');
            $password = $validationResult['data']['password']; // $request->input('password');
            $_users_ = DB::select('SELECT * FROM _users_ WHERE id = ?', [$plot]);
            $hash = $_users_[0]->password;
            $check = Hash::check($password, $hash);

//            dd($check);

            //$id = $_user_->id;

            if ($check) {
                // Генерация токена
                $token = Str::random(60);
                
                // Сохранение токена в сессии
                session(['token' => $token]);
                
                // Установка куки с токеном на 5 минут
                return redirect()->route('dashboard')
                    ->with('success', 'Добро пожаловать!')
                    ->cookie('auth_token', $token, 5); // Устанавливаем куку на 5 минут
            } else {
                return view('login')->with('error', 'Неверный пароль');
            }
        }

// dd($validationResult['data']['plot']);

//        dd('test');

        // dump($validationResult);
        // dump('$2y$10$nmb9oRQ3p5meyCcA9Ne4n.nixM7LYCifUXAbNBmF9WoCWYLnJiEZG');

        // Проверяем, существует ли пользователь с таким номером участка

        // $users = DB::select('SELECT * FROM _users_ WHERE id = ?', [$plot]);



        // dd($_users_);


        // dd($email);

        // Разбиваем строку по символу '@'
        // $parts = explode('@', $email);

        // $string = $parts[0] ?? null;

        // dump($string);

        // $new_password = HASH::make($string);

        // $res = DB::update('UPDATE _users_ SET password = ? WHERE id = ?', [$new_password, 151]); // $2y$10$U4ctfqnO7mQWGMff4D8nF.QL9MtwF21x01fD9IKDHvuGMZSD8kmg6

//        foreach ($_users_ as $user) {
//            // dump($user);
//            $id = $user->id;
//            $email = $user->email;
//            // dump($id);
//            $parts = explode('@', $email);
//            $string = $parts[0] ?? null;
//            $new_password = Hash::make($string);
//            // dump($new_password);
//            // $res = DB::update('UPDATE _users_ SET password = ? WHERE id = ?', [$new_password, $id]);
//            // dump($res);
//        }

        // $user = DB::table('_users_')->where('password', $new_password)->first();

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

    public function handleLogin(Request $request)
    {
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
        $error = '';

        // Проверка Участка
        if (empty($data['plot'])) {
            $error = 'Заполните поле участок';
        } elseif (!is_numeric($data['plot']) || intval($data['plot']) != $data['plot'] || $data['plot'] < 0) {
            $error = 'Участок должен быть целым неотрицательным числом.';
        } elseif (!is_numeric($data['plot']) || intval($data['plot']) != $data['plot'] || $data['plot'] > 255) {
            $error = 'Участок не должен быть выше знчения 255.';
        }

        // Проверка пароля
        if (empty($data['password'])) {
            $error = 'Поле ввода для пароля обязательно к заполнению.';
        } elseif (strlen($data['password']) < 6) {
            $error = 'Пароль должен содержать не менее 6 символов.';
        } elseif (strlen($data['password']) > 100) {
            $error = 'Пароль должен содержать не более 100 символов.';
        }

        // Если есть ошибки, возвращаем их
        if (!empty($error)) {
            return ['status' => 'error', 'error' => $error];
        }

        // Если все проверки пройдены, возвращаем валидированные данные
        return ['status' => 'success', 'data' => $data];
    }
}
