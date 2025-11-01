/**
 * Inicializa un slider reutilizable.
 * 
 * @param {Object} options - Configuración del slider.
 * @param {string} options.containerSelector - Selector principal del contenedor.
 * @param {string} options.slideSelector - Selector de cada slide.
 * @param {string} [options.tabSelector] - Selector de los botones de pestañas (opcional).
 * @param {string} options.prevBtnSelector - Selector del botón "anterior".
 * @param {string} options.nextBtnSelector - Selector del botón "siguiente".
 * @param {number} [options.interval] - Intervalo opcional para auto-rotación (en ms).
 */

function initSlider({
  containerSelector,
  slideSelector,
  tabSelector = null,
  prevBtnSelector = null,
  nextBtnSelector = null,
  interval = null
}) {
  const container = document.querySelector(containerSelector);
  if (!container) return;

  const slidesWrapper = container.querySelector(".slides-wrapper");
  const slides = container.querySelectorAll(slideSelector);
  const tabs = tabSelector ? container.querySelectorAll(tabSelector) : null;
  const btnPrev = prevBtnSelector ? container.querySelector(prevBtnSelector) : null;
  const btnNext = nextBtnSelector ? container.querySelector(nextBtnSelector) : null;
  const dots = container.querySelectorAll(".dot");

  if (!slidesWrapper || slides.length === 0) return;

  let currentIndex = 0;
  let autoSlide;

  function updateSlider(index) {
    slidesWrapper.style.transform = `translateX(-${index * 100}%)`;

        // === Tabs (opcional) ===
    if (tabs && tabs.length > 0) {
      tabs.forEach(btn => btn.classList.remove("btn-primary"));
      if (tabs[index]) tabs[index].classList.add("btn-primary");
    }

    // === Dots (opcional) ===
    if (dots && dots.length > 0) {
      dots.forEach(dot => dot.classList.remove("active"));
      if (dots[index]) dots[index].classList.add("active");
    }

    currentIndex = index;
  }

  //Evento botón "siguiente"
  if (btnNext) {
    btnNext.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider(currentIndex);
    });
  }

  //Evento botón "anterior"
  if (btnPrev) {
    btnPrev.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateSlider(currentIndex);
    });
  }

  //Evento para las pestañas (si existen)
  if (tabs && tabs.length > 0) {
    tabs.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        currentIndex = i;
        updateSlider(i);
      });
    });
  }
  
  //Evento para los puntos de navegación (dots)
  if (dots && dots.length > 0) {
    dots.forEach(dot => {
      dot.addEventListener("click", () => {
        const slideIndex = parseInt(dot.dataset.slide, 10);
        if (!isNaN(slideIndex)) {
          currentIndex = slideIndex;
          updateSlider(slideIndex);
        }
      });
    });
  }

  // Autoplay opcional
  if (interval) {
    autoSlide = setInterval(() => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider(currentIndex);
    }, interval);

    container.addEventListener("mouseenter", () => clearInterval(autoSlide));
    container.addEventListener("mouseleave", () => {
      autoSlide = setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider(currentIndex);
      }, interval);
    });
  }

  // Inicializa vista
  updateSlider(currentIndex);
}
