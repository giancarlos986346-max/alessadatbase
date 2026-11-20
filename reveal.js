/**
 * Inicializa el efecto de revelación (Animate on Scroll)
 * @param {string} selector - Selector de los elementos a animar
 * @param {number} threshold - Cuánto del elemento debe ser visible (0 a 1)
 */
function initScrollReveal(selector = '.reveal', threshold = 0.1) {
    const elements = document.querySelectorAll(selector);
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Un pequeño delay de 150ms ayuda a que el efecto se aprecie 
          // incluso si el usuario llega mediante un clic rápido en el navbar.
          setTimeout(() => {
            entry.target.classList.add('active');
          }, 150);
        }
      });
    }, {
      threshold: threshold,
      rootMargin: "0px 0px -50px 0px" // Activa un poco antes de que toque el fondo
    });
  
    elements.forEach(el => observer.observe(el));
  }
  
  // Ejecutar cuando el DOM esté listo
  document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
  });
