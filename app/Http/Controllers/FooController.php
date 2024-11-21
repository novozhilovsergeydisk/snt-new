<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooController extends Controller
{
<<<<<<< HEAD
    /**
     * Отображение формы.
     */
    public function showForm()
    {
        return view('foo');
    }

    /**
     * Обработка POST-запроса.
     */
    public function handlePost(Request $request)
    {
        // Получаем данные из формы
        $data = $request->input('data', 'Нет данных');

        // Возвращаем результат
        return view('foo', ['response' => $data]);
    }
}

=======
    public function index()
    {
        return view('foo');
    }
}
>>>>>>> 744b7a3 (Change files)
