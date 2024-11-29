document.addEventListener("DOMContentLoaded", () => {
    // 1
    const tableMobile = getElementByIdSafely("table-mobile");
    const tableDesktop = getElementByIdSafely("table-desktop");

    console.log({ tableMobile });

    console.log({ tableDesktop });

    function toggleTables() {
        if (window.innerWidth < 768) {
            tableMobile.classList.remove("hidden");
            tableDesktop.classList.add("hidden");
        } else {
            tableDesktop.classList.remove("hidden");
            tableMobile.classList.add("hidden");
        }
    }

    if (tableMobile && tableDesktop) {
        // Запуск при загрузке страницы
        toggleTables();

            // Событие изменения размера окна
        window.addEventListener("resize", toggleTables);
    }

    // 2
    const menuToggler = getElementByIdSafely("menu-toggler");
    const mobileMenu = getElementByIdSafely("mobile-menu");

    if (menuToggler && mobileMenu) {
        menuToggler.addEventListener("click", () => {
            console.log('toggle')
            mobileMenu.classList.toggle("hidden");
        });
    }

    // 3
    function getElementByIdSafely(id) {
        try {
            // Пытаемся получить элемент по id
            var element = document.getElementById(id);
    
            // Проверяем, был ли элемент найден
            if (!element) {
                // throw new Error("Элемент с id '" + id + "' не найден.");

                console.error("Элемент с id '" + id + "' не найден.");

                return null;
            }
    
            return element;
        } catch (error) {
            // Обрабатываем ошибку
    
            console.error("Произошла ошибка:", error.message);

            return null;
    
            // Можно также выводить сообщение на страницу
            // var errorMessageElement = document.getElementById("error-message");
            // if (errorMessageElement) {
            //     errorMessageElement.innerText = error.message;
            // }
        }
    }
    
    // Использование функции
    // getElementByIdSafely("some-id");
});