<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>snt dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <!-- Подключение Font Awesome через CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <!-- <link rel="modulepreload" href="/build/1O.js" /> -->
    <link rel="stylesheet" href="/css/build/1e.css"/>
    <link rel="stylesheet" href="/css/table.css"/>
    <script rel="modulepreload" src="/js/build/10.js"></script>
    <script rel="modulepreload" src="/js/mobile.js"></script>
    <script rel="modulepreload" src="/js/tailwind.js"></script>

    <!-- <script src="https://cdn.tailwindcss.com"></script>    -->
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="/dashboard">
                            <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg"
                                 class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200">
                                <path d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false"
                         @close.stop="open = false">
                        <div @click="open = ! open">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    @if(session('last_name'))
                                        <p>{{ session('last_name') }} {{ session('first_name') }}</p>
                                    @endif
                                </div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute z-50 mt-2 w-48 rounded-md shadow-lg ltr:origin-top-right rtl:origin-top-left end-0"
                             style="display: none;"
                             @click="open = false">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                                <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                   href="/profile">Профиль</a>
                                <!-- Authentication -->
                                <form method="POST" action="/logout" class="flex items-center">
                                    {{ csrf_field() }}
                                    <button type="submit" class="ml-5 text-white text-sm ml-[1rem]">Выйти</button>
                                    <i class="fas fa-sign-out-alt text-white text-sm ml-2"></i>
                                </form>

                            <!-- <form method="POST" action="/logout">
                                    {{ csrf_field() }}
                                    <button type="submit" class="ml-5 text-white sm-text">Выйти</button> <i class="fas fa-sign-out-alt"></i>
                                </form> -->
                            <!-- <form method="POST" action="/logout" class="flex items-center">
                                    {{ csrf_field() }}
                                    <button type="submit" class="ml-5 text-white sm-text flex items-center">
                                        Выйти 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10v1" />
                                        </svg>
                                    </button>
                                </form> -->
                            <!-- <form method="POST" action="/logout">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
                                 <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" href="/logout" onclick="event.preventDefault();
                                                     this.closest('form').submit();">Выход</a>
                                 </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <!-- <div class="pt-2 pb-3 space-y-1">
               <a class="block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-indigo-600 text-start text-base font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out" href="/dashboard">
               Панель управления
               </a>
            </div> -->
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <!-- <div class="px-4">
                   <div class="font-medium text-base text-gray-800 dark:text-gray-200">proxima</div>
                   <div class="font-medium text-sm text-gray-500">oximas</div>
                   </div> -->
                <div class="mt-3 space-y-1">
                    <a class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out"
                       href="/profile">
                        Профиль
                    </a>
                    <!-- Authentication -->
                    <form method="POST" action="/logout">
                    {{ csrf_field() }}
                    <!-- <input type="hidden" name="_token" value="" autocomplete="off"> -->
                        <a class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out"
                           href="/logout" onclick="event.preventDefault();
                           this.closest('form').submit();">
                            Выход <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Личный кабинет
            </h2>

        </div>
    </header>
    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
<div class="max-w-4xl mx-auto p-6 bg-gray-800 text-white shadow-lg rounded-lg text-center">
  <h2 class="text-3xl font-bold mb-4">Объявление</h2>
  <div class="mb-4">
    <p class="font-semibold">21 июня 2025 г. в 17:00</p>
  </div>
  <h3 class="text-2xl font-semibold mb-2">Возле правления СНТ состоится:</h3>
  <h4 class="text-lg font-medium mb-4">Очередное общее собрание</h4>
  <p class="font-bold mb-4">Повестка дня:</p>
<div class="flex justify-center items-center min-h-screen_">
  <div class_="w-full max-w-4xl p-6 bg-gray-800 text-white shadow-lg rounded-lg text-center">
    <ol class="list-decimal pl-6 leading-loose text-left">
      <li>Прием в члены СНТ нового собственника участка №18.</li>
      <li>Выборы председателя правления СНТ.<br />
        Кандидат: Родченков Н.С.</li>
      <li>Выборы состава правления СНТ.<br />
        Кандидаты: Сусоев А.М., Шутов Н.Ф., Шпнева Е.И.</li>
      <li>Утверждение отчета ревизионной комиссии за период с 01.07.2024–30.06.2025 гг.</li>
      <li>Выборы состава ревизионной комиссии.<br />
        Кандидаты: Калинина С.Л. (председатель), Лопатина И.А., Акишина Т.В.</li>
      <li>Утверждение расходной сметы на 2025–2026 гг.</li>
    </ol>
  </div>
</div>
  <p class="mt-4">Регистрация участников начинается в 16:30.<br />При невозможности присутствия на собрании, заполните бланк доверенности простой письменной формы.</p>
</div>
                    </div> 
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="c1" class="border border-gray-500 p-4">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Показания
                            электросчетчика</h2>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="c2" class="border border-gray-500 p-4">
                        @if(!session('electro_list'))
                            <p class="text-white/75">Данные не найдены.</p>
                        @else
                            <table class="min-w-full table-auto border-collapse bg-white text-sm">
                                <thead class="bg-gray-200">
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Т1 день</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Т2 ночь</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Сумма (Общий
                                        тариф)
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2 text-gray-700">@if(session('m')){{ session('m') }}@endif</td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-700">@if(session('l')){{ session('l') }}@endif</td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-700">@if(session('summ')){{ session('summ') }}@endif</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="c1" class="border border-gray-500 p-4">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Целевые
                            расходы</h2>
			<h5 class="font-semibold_ text-1rem text-gray-800 dark:text-gray-200 leading-tight">
				Статистика по состоянию на 03.06.2025 г.
			</h5>
                    </div>
                </div>

                <div id="balance-list" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="c2" class="border border-gray-500 p-4">
                        @if(!session('balance_list'))
                            <p class="text-white/75">Данные не найдены.</p>
                        @else
                            @php
                                // Инициализация переменных для хранения итогов
                                $totalAccrued = 0;
                                $totalPaid = 0;
                                $totalDebt = 0;
                                $totalOverpayment = 0;

                                // Подсчет итогов по каждому столбцу
                                foreach (session('balance_list') as $balance) {
                                    $totalAccrued += $balance->accrued;
                                    $totalPaid += $balance->paid;
                                    $totalDebt += $balance->debt;
                                    $totalOverpayment += $balance->overpayment;
                                }
                            @endphp
                            <table id="table-mobile"
                                   class="w-full table-auto bg-white text-sm border border-gray-300 hidden">
                                <thead class="bg-gray-200">
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left">Параметр</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Значение</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (session('balance_list') as $balance)
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Целевое назначение</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $balance->expense_item }}</td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Начислено</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->accrued, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Оплачено</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->paid, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Задолженность</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->debt, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Переплата</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->overpayment, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table id="table-desktop" class="min-w-full table-auto border-collapse bg-white text-sm">
                                <thead class="bg-gray-200">
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left">Целевое назначение</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Начислено</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Оплачено</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Задолженность</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Переплата</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (session('balance_list') as $balance)
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $balance->expense_item }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->accrued, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->paid, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->debt, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ number_format($balance->overpayment, 2, ',', ' ') }}
                                            ₽
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="text-green-700 font-bold pl-4">Итого</td>
                                    <td class="border border-gray-300 px-4 py-2 text-green-700 font-bold">{{ number_format($totalAccrued, 2, ',', ' ') }}
                                        ₽
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-green-700 font-bold">{{ number_format($totalPaid, 2, ',', ' ') }}
                                        ₽
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-green-700 font-bold">{{ number_format($totalDebt, 2, ',', ' ') }}
                                        ₽
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-green-700 font-bold">{{ number_format($totalOverpayment, 2, ',', ' ') }}
                                        ₽
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>


        </div>

    </main>
</div>
</body>
</html>
