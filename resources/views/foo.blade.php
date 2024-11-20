<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foo Form</title>
</head>
<body>
    <h1>Форма данных</h1>

    @if(isset($response))
        <p><strong>Результат:</strong> {{ $response }}</p>
    @endif

    <form method="POST" action="{{ route('foo.post') }}">
        @csrf
        <label for="data">Введите данные:</label>
        <input type="text" id="data" name="data">
        <button type="submit">Отправить</button>
    </form>
</body>
</html>

