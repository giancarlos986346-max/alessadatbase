    /**
     * Inicializa acordeones (tipo FAQ) en un contenedor dado.
     * @param {string} containerSelector - Selector CSS del contenedor principal (ej. ".faq-section")
     * @param {boolean} allowMultipleOpen - Si es true, permite varios abiertos a la vez.
     */
    function initAccordion(containerSelector, allowMultipleOpen = false) {
    const container = document.querySelector(containerSelector);
    if (!container) return;


    const items = container.querySelectorAll(".faq-item");

    items.forEach(item => {
        const question = item.querySelector(".faq-question");

        question.addEventListener("click", () => {
        const isOpen = item.classList.contains("open");

        // Si no se permiten múltiples abiertos, cierra los demás
        if (!allowMultipleOpen) {
            items.forEach(i => i.classList.remove("open"));
        }

        // Alterna el estado del actual
        if (!isOpen) {
            item.classList.add("open");
        } else {
            item.classList.remove("open");
        }
        });
    });
}
