/**
 * Inicializa acordeones (tipo FAQ) en un contenedor dado.
 * Si el contenedor tiene slides (.faq-slide) y puntos (.faq-dot),
 * también activa la navegación entre slides.
 * @param {string} containerSelector - Selector CSS del contenedor principal (ej. ".faq-section")
 * @param {boolean} allowMultipleOpen - Si es true, permite varios abiertos a la vez.
 */
function initAccordion(containerSelector, allowMultipleOpen = false) {
    const container = document.querySelector(containerSelector);
    if (!container) return;

    const items = container.querySelectorAll(".faq-item");

    const setOpen = (item, open) => {
        item.classList.toggle("open", open);
        const question = item.querySelector(".faq-question");
        if (question) question.setAttribute("aria-expanded", String(open));
    };

    const closeAll = () => items.forEach(i => setOpen(i, false));

    items.forEach(item => {
        const question = item.querySelector(".faq-question");
        if (!question) return;

        question.addEventListener("click", () => {
            const isOpen = item.classList.contains("open");

            // Si no se permiten múltiples abiertos, cierra los demás
            if (!allowMultipleOpen) closeAll();

            setOpen(item, !isOpen);
        });
    });

    initFaqSlides(container, closeAll);
}

/**
 * Navegación por puntos entre slides de preguntas.
 * Fija la altura mínima al slide más alto (con todo cerrado)
 * para que la página no salte al cambiar de slide.
 */
function initFaqSlides(container, onChange) {
    const slidesBox = container.querySelector(".faq-slides");
    const slides = container.querySelectorAll(".faq-slide");
    const dots = container.querySelectorAll(".faq-dot");
    if (!slidesBox || slides.length < 2 || !dots.length) return;

    const fixHeight = () => {
        slidesBox.style.minHeight = "";
        let max = 0;
        slides.forEach(slide => {
            const wasHidden = slide.hidden;
            slide.hidden = false;
            // Altura con todo cerrado (descontando respuestas abiertas).
            // El contenedor se ajusta a las cajas; al abrir una, solo crece hacia abajo.
            let openAnswers = 0;
            slide.querySelectorAll(".faq-item.open .faq-answer").forEach(a => { openAnswers += a.offsetHeight; });
            max = Math.max(max, slide.offsetHeight - openAnswers);
            slide.hidden = wasHidden;
        });
        slidesBox.style.minHeight = max + "px";
    };

    const goTo = index => {
        onChange();
        slides.forEach((slide, i) => { slide.hidden = i !== index; });
        dots.forEach((dot, i) => {
            const active = i === index;
            dot.classList.toggle("active", active);
            dot.setAttribute("aria-selected", String(active));
            dot.tabIndex = active ? 0 : -1;
        });
    };

    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => goTo(i));

        // Flechas izquierda/derecha entre los puntos (accesibilidad)
        dot.addEventListener("keydown", e => {
            if (e.key !== "ArrowRight" && e.key !== "ArrowLeft") return;
            e.preventDefault();
            const next = (i + (e.key === "ArrowRight" ? 1 : -1) + dots.length) % dots.length;
            goTo(next);
            dots[next].focus();
        });
    });

    goTo(0);
    fixHeight();
    window.addEventListener("resize", fixHeight);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(fixHeight);
}
