<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Cookie;

class LoginPostController extends Controller
{
    public function auth(Request $request)
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
            $_users_ = DB::select('SELECT * FROM _users_ WHERE id = ?', [$plot])[0];
            $hash = $_users_->password;
            $check = Hash::check($password, $hash);

            // dd($_users_);

            //$id = $_user_->id;

            if ($check) {
                // Генерация токена
                $token = Str::random(60);
                
                // Сохранение токена в сессии
                session(['token' => $token]);

                $user = DB::select('SELECT * FROM clients WHERE plot = ?', [$plot])[0];

                if (empty($user)) {
                    return view('login')->with('error', 'Пользователь с таким ID не найден');
                }

                $user_id = $user->user_id;
                $last_name = $user->last_name;
                $first_name = $user->first_name;
                $middle_name = $user->middle_name;
                $electro_counter = $user->electro_counter;

                $balance_list = DB::select('SELECT * FROM turnover_balance_sheet WHERE plot = ?', [$plot]);

                $electro_list = DB::select('SELECT * FROM electro_counter_list WHERE user_id = ?', [$user_id]);

                if ($electro_list === []) {
                    $m = '';
                    $l = '';
                    $summ = '';
                } else {
                    $m = $electro_list[0]->m;
                    $l = $electro_list[0]->l;
                    $summ = $electro_list[0]->summ;
                }

                // dd($electro_list);

                // dump($l);

                // dump($balance_list);

                // dd($electro_list);

                session(['last_name' => $last_name]);
                session(['first_name' => $first_name]);
                session(['balance_list' => $balance_list]);
                session(['electro_list' => $electro_list]);
                session(['m' => $m]);
                session(['l' => $l]);
                session(['summ' => $summ]);

                // dump(session()->get('electro_list'));

                // dd(session()->get('balance_list'));

                // Установить куку
                Cookie::queue('auth_token', $token, $minutes = 5);

                return view('dashboard');
                
                // Установка куки с токеном на 5 минут
            
                // return redirect()->route('dashboard')->cookie('auth_token', $token, 5);
            } else {
                return view('login')->with('error', 'Неверный пароль');
            }
        }

        // Возвращаем успешный ответ
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful!',
            'data' => $validationResult['data'],
        ]);
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
