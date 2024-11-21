<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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

=======
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Foo View</title>
</head>
<body>
<h1>Welcome to the Foo page!</h1>

<form action="/foo" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
    <input type="text" id="email" name="email" placeholder="Enter your email" required>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>
    <div id="error-messages" style="color: red;"></div> <!-- Блок для ошибок -->
    <button id="test" type="button">test</button>
</form>

<script src="/js/utils.js"></script>

<script>
const testBtn = document.getElementById('test');
const errorMessages = document.getElementById('error-messages');

testBtn.addEventListener('click', function () {
    const url = '/foo';
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Проверяем, что пароль не пустой и соответствует требованиям
    if (!password || password.length < 6) {
        errorMessages.innerHTML = '<p>Пароль должен содержать не менее 6 символов.</p>';
        return; // Останавливаем выполнение функции
    }

    const data = new URLSearchParams({
        email: email,
        password: password // Передаем введенные значения
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: data.toString()
    })
        .then(async response => {
            errorMessages.innerHTML = ''; // Очищаем предыдущие ошибки
            if (!response.ok) {
                const errorData = await response.json(); // Получаем JSON с ошибками
                if (response.status === 422) {
                    // Обрабатываем ошибки валидации
                    for (const [field, messages] of Object.entries(errorData.errors)) {
                        messages.forEach(msg => {
                            errorMessages.innerHTML += `<p>${msg}</p>`;
                        });
                    }
                }
                throw new Error(`HTTP error! Status: ${response.status}. Response: ${JSON.stringify(errorData)}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response:', data);
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });

    console.log('click');
});
</script>

</body>
</html>
>>>>>>> 744b7a3 (Change files)
