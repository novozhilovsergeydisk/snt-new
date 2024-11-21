// Обертка над document.getElementById
function getElementById(id) {
    return document.getElementById(id);
}

// Обертка над fetch
function fetchWrapper(url, options = {}) {
    // Проверка, является ли options массивом
    if (Array.isArray(options)) {
        options = Object.assign({}, ...options.map((item, index) => ({ [index]: item })));
    }

    // Устанавливаем метод по умолчанию
    options.method = options.method || 'GET';

    // Проверяем, есть ли параметры для отправки
    if (options.body) {
        if (typeof options.body === 'object' && !Array.isArray(options.body)) {
            // Если body - это объект, преобразуем его в URL-формат по умолчанию
            const formBody = Object.keys(options.body)
                .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(options.body[key]))
                .join('&');

            // Устанавливаем заголовок Content-Type по умолчанию
            options.headers = {
                ...options.headers,
                'Content-Type': 'application/x-www-form-urlencoded'
            };
            options.body = formBody;
        }
    }

    // Выполнение fetch-запроса
    return fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .catch(error => {
            console.error('Fetch error:', error);
            throw error; // Пробрасываем ошибку дальше
        });
}

function clickHandler(target, handler) {
    console.log(target instanceof HTMLElement)

    // Проверяем, является ли target элементом DOM
    if (target instanceof HTMLElement) {
        target.addEventListener('click', handler);
    } else if (typeof handler === 'function') {
        // Если target не элемент, предполагаем, что это функция

        console.log('Если target не элемент, предполагаем, что это функция')

        handler();
    } else {
        console.error('Invalid target or handler. Please provide a DOM element or a function.');
    }
}

const login = async () => {
    const url = '/login';
    const data = {
        email: 'admin@example.com',
        password: 'password'
    };

    const formBody = Object.keys(data)
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(data[key])}`)
        .join('&');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: formBody
        });

        if (response.ok) {
            const result = await response.json();
            console.log('Успешный вход:', result.message);
        } else {
            const error = await response.json();
            console.error('Ошибка входа:', error.message);
        }
    } catch (error) {
        console.error('Произошла ошибка запроса:', error);
    }
};