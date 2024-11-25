<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Регистрация</title>
</head>
<body>

<h1></h1>

<form id="register-form" action="/register" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">

    <div>
        <label for="plot">Имя:</label>
        <input type="text" name="plot" placeholder="№ участка" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit">Зарегистрироваться</button>
</form>

<div id="error-messages" style="color:red;"></div>

<script>
document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    const plot = document.getElementById('plot').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    console.log({ plot })
    console.log({ email })
    console.log({ password })

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log({ csrfToken })

    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: new URLSearchParams({
            plot: plot,
            email: email,
            password: password,
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                document.getElementById('error-messages').innerText = data.errors ? Object.values(data.errors).flat().join(', ') : data.message;
            });
        }
        
        return response.json();
    })
    .then(data => {
        console.log(data);
        alert(data.message); // Успешная регистрация
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});
</script>

</body>
</html>
