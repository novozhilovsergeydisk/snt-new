document.addEventListener("DOMContentLoaded", () => {
    const tableMobile = document.getElementById("table-mobile");
    const tableDesktop = document.getElementById("table-desktop");

    function toggleTables() {
        if (window.innerWidth < 768) {
            tableMobile.classList.remove("hidden");
            tableDesktop.classList.add("hidden");
        } else {
            tableDesktop.classList.remove("hidden");
            tableMobile.classList.add("hidden");
        }
    }

    // Запуск при загрузке страницы
    toggleTables();

    // Событие изменения размера окна
    window.addEventListener("resize", toggleTables);
});
