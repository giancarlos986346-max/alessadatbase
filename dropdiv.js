/**
 * Inicializa acordeones (tipo FAQ) en un contenedor dado.
 * Si el contenedor tiene slides (.faq-slide) y puntos (.faq-dot),
 * también activa la navegación entre slides y el avance automático.
 * @param {string} containerSelector - Selector CSS del contenedor principal (ej. ".faq-section")
 * @param {boolean} allowMultipleOpen - Si es true, permite varios abiertos a la vez.
 */
function initAccordion(containerSelector, allowMultipleOpen = false) {
    const container = document.querySelector(containerSelector);
    if (!container) return;

    const items = container.querySelectorAll(".faq-item");
    let slider = null;

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

            // Con una caja abierta el avance automático se detiene;
            // al cerrarla, el tiempo vuelve a empezar desde cero.
            if (slider) slider.restart();
        });
    });

    slider = initFaqSlides(container, closeAll);
}

/**
 * Navegación por puntos entre slides de preguntas.
 * - Fija la altura mínima al slide más alto (con todo cerrado)
 *   para que la página no salte al cambiar de slide.
 * - Avance automático en loop (data-interval en .faq-slider, en ms; 0 lo desactiva).
 *   Se detiene si hay una caja abierta, si el mouse está sobre las preguntas,
 *   si se navega con teclado, si la sección no está en pantalla o la pestaña está oculta.
 *   No se activa si el usuario pidió reducir el movimiento.
 * @returns {{restart: Function}|undefined}
 */
function initFaqSlides(container, onChange) {
    const slider = container.querySelector(".faq-slider");
    const slidesBox = container.querySelector(".faq-slides");
    const slides = container.querySelectorAll(".faq-slide");
    const dots = container.querySelectorAll(".faq-dot");
    if (!slider || !slidesBox || slides.length < 2 || !dots.length) return;

    const autoplayMs = parseInt(slider.dataset.interval, 10) || 0;
    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    let current = 0;
    let timer = null;
    let hovering = false;
    let keyboardFocus = false;
    let visible = false;

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
        current = index;
        slides.forEach((slide, i) => { slide.hidden = i !== index; });
        dots.forEach((dot, i) => {
            const active = i === index;
            dot.classList.toggle("active", active);
            dot.setAttribute("aria-selected", String(active));
            dot.tabIndex = active ? 0 : -1;
        });
    };

    // ===== Avance automático =====
    const canPlay = () =>
        autoplayMs > 0 &&
        !reduceMotion &&
        visible &&
        !hovering &&
        !keyboardFocus &&
        !document.hidden &&
        !container.querySelector(".faq-item.open");

    const stop = () => {
        clearTimeout(timer);
        timer = null;
        dots.forEach(d => d.classList.remove("running"));
    };

    // Reinicia el conteo completo (y la barra de progreso del punto activo)
    const restart = () => {
        stop();
        if (!canPlay()) return;
        const dot = dots[current];
        void dot.offsetWidth; // reinicia la animación CSS
        dot.classList.add("running");
        timer = setTimeout(() => {
            goTo((current + 1) % slides.length);
            restart();
        }, autoplayMs);
    };

    if (autoplayMs > 0) {
        slider.style.setProperty("--faq-autoplay", autoplayMs + "ms");

        // Pausa mientras el mouse está sobre las preguntas (solo mouse, no táctil)
        slider.addEventListener("pointerenter", e => {
            if (e.pointerType !== "mouse") return;
            hovering = true;
            stop();
        });
        slider.addEventListener("pointerleave", e => {
            if (e.pointerType !== "mouse") return;
            hovering = false;
            restart();
        });

        // Pausa mientras se navega con teclado dentro de las preguntas
        slider.addEventListener("focusin", e => {
            keyboardFocus = e.target.matches(":focus-visible");
            if (keyboardFocus) stop();
        });
        slider.addEventListener("focusout", e => {
            if (slider.contains(e.relatedTarget)) return;
            keyboardFocus = false;
            restart();
        });

        // Solo avanza cuando la sección está en pantalla
        if ("IntersectionObserver" in window) {
            new IntersectionObserver(entries => {
                visible = entries[0].isIntersecting;
                visible ? restart() : stop();
            }, { threshold: 0.35 }).observe(slider);
        } else {
            visible = true;
        }

        // Pausa si la pestaña del navegador no está visible
        document.addEventListener("visibilitychange", () => {
            document.hidden ? stop() : restart();
        });
    }

    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => {
            goTo(i);
            restart();
        });

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
    restart();
    window.addEventListener("resize", fixHeight);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(fixHeight);

    return { restart };
}
