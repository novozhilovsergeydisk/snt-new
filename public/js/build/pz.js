// Объект для управления кнопкой "Вверх"
const t = {
    el: document.querySelector(".btn-up"), // Находим кнопку с классом .btn-up

    // Метод для показа кнопки
    show() {
        this.el.classList.remove("btn-up_hide"); // Убираем класс, скрывающий кнопку
    },

    // Метод для скрытия кнопки
    hide() {
        this.el.classList.add("btn-up_hide"); // Добавляем класс, скрывающий кнопку
    },

    // Метод для добавления обработчиков событий
    addEventListener() {
        // Обработка прокрутки страницы
        window.addEventListener("scroll", () => {
            const scrollPosition = window.scrollY || document.documentElement.scrollTop; // Текущая позиция прокрутки
            if (scrollPosition > 400) {
                this.show(); // Показываем кнопку, если прокрутка больше 400px
            } else {
                this.hide(); // Скрываем кнопку, если прокрутка меньше 400px
            }
        });

        // Обработка клика на кнопку
        document.querySelector(".btn-up").onclick = () => {
            window.scrollTo({
                top: 0,      // Прокручиваем к началу страницы
                left: 0,     // Слева ничего не изменяем
                behavior: "smooth" // Прокрутка плавная
            });
        };
    }
};

// Добавляем обработчики событий для кнопки "Вверх"
t.addEventListener();

// Функция для обработки клика на странице
function o(event) {
    console.log(event.target); // Выводим элемент, по которому был клик
}

// Добавляем обработчик клика на весь документ
document.addEventListener("click", (event) => {
    o(event); // Вызываем функцию o с объектом события
});

// Выводим сообщение в консоль
console.log("up");
