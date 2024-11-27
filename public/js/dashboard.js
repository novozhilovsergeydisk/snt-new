// JavaScript код для обработки отправки формы
const loginButton = document.getElementById('login');
const errorMessages = document.getElementById('error-messages');
const successMessages = document.getElementById('success-messages');

// loginButton.addEventListener('click', function () {
//     const url = '/login';
//     const email = document.getElementById('email').value;
//     const password = document.getElementById('password').value;

//     // Проверяем валидность данных перед отправкой
//     if (!email) {
//         errorMessages.innerHTML = '<p>Поле электронной почты обязательно.</p>';
//         return; // Останавливаем выполнение функции
//     }

//     if (!password || password.length < 8) {
//         errorMessages.innerHTML = '<p>Пароль должен содержать не менее 6 символов.</p>';
//         return; // Останавливаем выполнение функции
//     }

//     const data = new URLSearchParams({
//         email: email,
//         password: password // Передаем введенные значения
//     });

//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     fetch(url, {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//             'X-CSRF-TOKEN': csrfToken,
//         },
//         body: data.toString()
//     })
//     .then(async response => {
//         errorMessages.innerHTML = ''; // Очищаем предыдущие ошибки
//         if (!response.ok) {
//             const errorData = await response.json(); // Получаем JSON с ошибками
//             if (response.status === 422) {
//                 // Обрабатываем ошибки валидации
//                 for (const [field, messages] of Object.entries(errorData.errors)) {
//                     messages.forEach(msg => {
//                         errorMessages.innerHTML += `<p>${msg}</p>`;
//                     });
//                 }
//             }
//             throw new Error(`HTTP error! Status: ${response.status}. Response: ${JSON.stringify(errorData)}`);
//         }
//         return response.json();
//     })
//     .then(data => {
//         if (data.status === 'success') {
//             successMessages.innerHTML = data.message;
//         }
//         console.log(data.status);
//         console.log('Response:', data);
//     })
//     .catch(error => {
//         console.error('Fetch error:', error);
//     });

// });