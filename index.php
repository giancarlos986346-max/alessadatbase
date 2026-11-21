<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alessa Database</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilos.css?v=3.4" />
</head>
<body>
  <!-- Header -->
  <header class="navbar">
    <div class="logo">
      <img src="Images/logo.png" alt="Alessa Logo">
      <span>ALESSA</span>
    </div>
    
    <div class="menu-toggle" id="mobile-menu">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </div>

    <nav class="nav-links">
      <a href="#hero">Principal</a>
      <a href="#sobre-nosotros">Acerca de</a>
      <a href="#caracteristicas">Características</a>
      <a href="#workflow">Workflow</a>
      <a href="#faq">Preguntas</a>
      <a href="#testimonios">Testimonios</a>
      <a href="#contacto">Contáctanos</a>
      <a href="#contacto" class="btn-mobile">Reserva Demo</a>
    </nav>
    <a href="#contacto" class="btn-header">Reserva Demo</a>
  </header>

  <!-- Hero Section -->
  <section class="hero reveal" id="hero">
    <div class="hero-container">
      <div class="hero-content">
        <span class="tag">Base de datos de Farmacovigilancia</span>
        <h1>Alessa Database</h1>
        <p>
          Plataforma integral de gestión de casos de farmacovigilancia, 
          diseñada para transformar datos clínicos en conocimiento accionable.
        </p>
        <div class="buttons">
          <a href="#contacto" class="btn-primary">Reserva Demo</a>
          <a href="Docs/Brochure_BaseDatos.pdf" class="btn-secondary" target="_blank" rel="noopener noreferrer">Ver Brochure</a>
        </div>
      </div>
      <div class="hero-media">
        <img src="Images/Hero02-main.png" alt="Alessa Hero">
        <!-- Para usar el video en lugar de la imagen, descomenta las siguientes líneas y comenta o elimina la etiqueta <img> superior:
        <video autoplay muted loop playsinline class="hero-video-element">
          <source src="Videos/AlessaMain.mp4" type="video/mp4">
          Tu navegador no soporta el elemento de video.
        </video>
        -->
      </div>
    </div>
  </section>

  <!-- Sección: About us -->
  <section class="seccion-sobre-nosotros reveal" id="sobre-nosotros">
  <div class="slider-container">
    <button class="slider-btn left" id="btn-prev">&#10094;</button>

    <div class="slider-content">
      <!-- Puntos de navegación -->
      <div class="slider-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
        <span class="dot" data-slide="3"></span>
      </div>


      <div class="slides-wrapper">
        <!-- Slide 1 -->
        <div class="slide active">
          <div class="slide-text">
            <h2>Nosotros</h2>
            <p>
              Somos una organización comprometida con la innovación en farmacovigilancia,
              ofreciendo soluciones tecnológicas que transforman los datos en conocimiento
              útil para la toma de decisiones clínicas.
            </p>
          </div>
          <div class="slide-image">
            <img src="Images/nosotros.jpg" alt="Nosotros">
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide">
          <div class="slide-text">
            <h2>Misión</h2>
            <p>
              Promover la seguridad del paciente mediante herramientas digitales confiables
              que faciliten la gestión de casos y garanticen el cumplimiento normativo.
            </p>
          </div>
          <div class="slide-image">
            <img src="Images/mision.jpg" alt="Misión">
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide">
          <div class="slide-text">
            <h2>Visión</h2>
            <p>
              Ser la plataforma líder en farmacovigilancia en Latinoamérica, integrando tecnología y ciencia de datos para una toma de decisiones precisa y oportuna. 
              Cumpliendo los más altos estándares internacionales (ISO 9001, GAMP 5, CFR21 Part 11, ICH E2B).
            </p>
          </div>
          <div class="slide-image">
            <img src="Images/vision.jpg" alt="Visión">
          </div>
        </div>

        <!-- Slide 4 -->
        <div class="slide">
          <div class="slide-text">
            <h2>Compromiso</h2>
            <p>
              Trabajamos con ética, transparencia y excelencia, enfocados en brindar valor
              y seguridad a los profesionales de salud y pacientes. Alessa Database cuenta
              con el respaldo de <strong>Conkomerco</strong>, empresa líder en farmacovigilancia y tecnovigilancia, reconocida por su amplia experiencia en cumplimiento normativo, gestión de riesgos y seguridad sanitaria.
            </p>
          </div>
          <div class="slide-image">
            <img src="Images/compromiso.jpg" alt="Compromiso">
          </div>
        </div>
      </div>
    </div>

    <button class="slider-btn right" id="btn-next">&#10095;</button>
  </div>
</section>

  
  <!-- Sección: Características -->
   <section class="seccion-caracteristicas reveal" id="caracteristicas">
    <h2>Características Principales</h2>
    <div class="grid-caracteristicas">
        
        <div class="caracteristica">
        <img src="Images/icon1.png" alt="Gestión de SRA" class="icono-primario">
        <h3>Gestión de SRA / ICSR</h3>
        <p>Ingresa nuevos casos, edita información y actualiza seguimientos de reportes de sospechas de reacciones adversas (SRA) / Individual Case Safety Report (ICSR).</p>
        </div>

        <div class="caracteristica">
        <img src="Images/icon2.png" alt="Evaluación de Causalidad" class="icono-primario">
        <h3>Respaldo de datos​</h3>
        <p>Crea copias de seguridad en la nube para garantizar la protección de la información.</p>
        </div>

        <div class="caracteristica">
        <img src="Images/icon3.png" alt="Alertas de Seguridad" class="icono-primario">
        <h3>Análisis de tendencias​​</h3>
        <p>Genera reportes automáticos y gráficos que facilitan la identificación de patrones o señales de seguridad.</p>
        </div>

        <div class="caracteristica">
        <img src="Images/icon4.png" alt="Gestión Documental" class="icono-primario">
        <h3>Trasmisión XML E2B</h3>
        <p>La base de datos cumple con estandar E2B(R3) y permite la trasmisión de archivos XML.</p>
        </div>

        <div class="caracteristica">
        <img src="Images/icon5.png" alt="Reportes Analíticos" class="icono-primario">
        <h3>Validación del sistema</h3>
        <p>Ofrecemos el servicio de validación de la base de datos como sistema computarizado (VSC), según el Manual de Buenas Prácticas de Farmacovigilancia (BPF) o normativas internacionles (FDA CRF21 Parte 11 / GAMP-5).</p>
        </div>

        <div class="caracteristica">
        <img src="Images/icon6.png" alt="Soporte y ayuda" class="icono-primario">
        <h3>Soporte y ayuda</h3>
        <p>Contacta nuestro servicio de asistencia remota en caso de fallos o solicita una porpuesta de personalización de acuerdo a tus necesidades.</p>
        </div>

    </div>
  </section>

  <section class="seccion-workflow reveal" id="workflow">
  <div class="workflow-content">
    <div class="workflow-text">
      <span class="tag">Flujo de trabajo</span>
      <h2>Obten tu base de datos validada de forma sencilla</h2>
      <p>
        Gestiona el proceso de implementación y validación de una base datos de farmacovigilancia con un enfoque inteligente y eficiente.
        Descubre herramientas innovadoras, asesoría experta y estrategias prácticas para optimizar la gestión de datos, fortalecer la trazabilidad y garantizar la integridad de la información en cada etapa del proceso.
      </p>
      <a href="#contacto" class="btn-secondary">Reserva Demo</a>
    </div>

    <div class="workflow-steps">
      <div class="step">
        <div class="icono">✏️</div>
        <div>
          <h3>Registrate</h3>
          <p>Crea una cuenta en minutos.</p>
        </div>
      </div>

      <div class="step">
        <div class="icono">🔗</div>
        <div>
          <h3>Reserva tu Demo</h3>
          <p>Un ejecutivo se prondrá en contacto para agendar una cita.</p>
        </div>
      </div>

      <div class="step">
        <div class="icono">🔍</div>
        <div>
          <h3>Requisitos de usuario</h3>
          <p>Define el alcance y funciones de la base de datos</p>
        </div>
      </div>

      <div class="step">
        <div class="icono">💳</div>
        <div>
          <h3>Implementación</h3>
          <p>Obten la base de datos dentro de tu empresa</p>
        </div>
      </div>

      <div class="step">
        <div class="icono">♾️</div>
        <div>
          <h3>Plan de validación</h3>
          <p>Evalúa el desempeño del sistema y obten un informe del proceso.</p>
        </div>
      </div>
    </div>
  </div>
</section>

  <section class="seccion-beneficios reveal" id="beneficios">
    <div class="beneficios-container">
      <div class="beneficios-content">
        <span class="tag">Problema y Beneficio</span>
        <h2>Transformación digital en farmacovigilancia</h2>
        <p>
          Convierte el caos operativo en  una farmacovigilancia inteligente.
Alessa es una base de datos centralizada de Farmacovigilancia que mejora trazabilidad, cumplimiento regulatorio y análisis estratégico.
        </p>
        <div class="buttons">
          <a href="Docs/Brochure_BaseDatos.pdf" class="btn-primary" target="_blank" rel="noopener noreferrer">Ver Brochure</a>
        </div>
      </div>
      <div class="beneficios-video">
        <video autoplay muted loop playsinline poster="Images/laptop-main.jpg">
          <source src="Videos/BeneficiosAlessa.mp4" type="video/mp4">
          Tu navegador no soporta el elemento de video.
        </video>
      </div>
    </div>
  </section>

<?php
  $faqs      = require __DIR__ . '/php/faq_data.php';
  $faqSlides = array_chunk($faqs, FAQ_PER_SLIDE);
  $faqIndex  = 0;
?>
<section class="faq-section reveal" id="faq">
  <span class="faq-blob faq-blob--teal" aria-hidden="true"></span>
  <span class="faq-blob faq-blob--coral" aria-hidden="true"></span>

  <div class="faq-header">
    <span class="faq-label">FAQ</span>
    <h2 class="faq-title">Preguntas frecuentes</h2>
    <p class="faq-subtitle">
      Estas son algunas de las interrogantes más comunes antes de iniciar un proceso de validación
    </p>
  </div>

  <div class="faq-layout">
    <div class="faq-slider">
      <div class="faq-slides">
        <?php foreach ($faqSlides as $s => $slide): ?>
        <div class="faq-slide<?= $s === 0 ? ' active' : '' ?>" id="faq-slide-<?= $s ?>" role="tabpanel" aria-label="Preguntas <?= $faqIndex + 1 ?> a <?= $faqIndex + count($slide) ?>"<?= $s === 0 ? '' : ' hidden' ?>>
          <?php foreach ($slide as $item): $faqIndex++; ?>
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-<?= $faqIndex ?>">
              <span><?= htmlspecialchars($item['q'], ENT_QUOTES, 'UTF-8') ?></span>
              <span class="arrow" aria-hidden="true">▼</span>
            </button>
            <div class="faq-answer" id="faq-answer-<?= $faqIndex ?>">
              <p><?= htmlspecialchars($item['a'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
      </div>

      <?php if (count($faqSlides) > 1): ?>
      <div class="faq-dots" role="tablist" aria-label="Páginas de preguntas">
        <?php foreach ($faqSlides as $s => $slide): ?>
        <button class="faq-dot<?= $s === 0 ? ' active' : '' ?>" type="button" role="tab" data-slide="<?= $s ?>" aria-controls="faq-slide-<?= $s ?>" aria-selected="<?= $s === 0 ? 'true' : 'false' ?>" aria-label="Página <?= $s + 1 ?> de preguntas"></button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>

    <aside class="faq-cta">
      <div class="faq-cta-icon" aria-hidden="true">?</div>
      <h3>¿Tienes otra pregunta?</h3>
      <p>Escríbenos y nuestro equipo resolverá tus dudas sobre la validación de tu base de datos.</p>
      <a href="#contacto" class="faq-cta-btn">Escríbenos</a>
    </aside>
  </div>
</section>

<section class="testimonials-section reveal" id="testimonios">
  <div class="testimonials-header">
    <span class="section-label">HISTORIAS QUE INSPIRAN CONFIANZA</span>
    <h2 class="section-title">Porque nada habla mejor de nosotros que la voz de quienes confían en nuestro proyecto</h2>
    <p class="section-subtitle">
      Descubre las experiencias de quienes ya confiaron en nosotros. 
      Cada testimonio refleja el compromiso, la calidad y la dedicación que ponemos en cada servicio.
    </p>
  </div>

  <!-- SLIDER -->
  <div class="slider-container testimonials-slider">
    <button class="slider-btn left" id="btn-prev">&#10094;</button>
    <div class="slider-content">
      
      <!-- Puntos de navegación -->
      <div class="slider-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
      </div>
    
      <div class="slides-wrapper">
        <!-- Slide 1 -->
        <div class="slide">
          <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">
              La base de datos Alessa optimiza la farmacovigilancia al integrar información de seguridad en tiempo real, 
              fortaleciendo la trazabilidad, la eficiencia y el cumplimiento normativo.
            </p>
            <div class="testimonial-author">
              <strong>Russbel Aliaga</strong>
              <span>Octubre 30, 2025</span>
            </div>
          </div>
          <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">
              Alessa transforma la farmacovigilancia con un sistema inteligente que unifica la información, 
              agiliza la gestión de SRA, eleva la calidad y transparencia en el manejo de casos.
            </p>
            <div class="testimonial-author">
              <strong>Gian Carlos Chafloque</strong>
              <span>Noviembre 04, 2025</span>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide">
          <div class="testimonial-card">
            <div class="stars">★★★★☆</div>
            <p class="testimonial-text">
              Claire provided excellent advice and support throughout the mortgage process.
              Highly recommended for anyone seeking clarity and confidence.
            </p>
            <div class="testimonial-author">
              <strong>Sophie Turner</strong>
              <span>Oct 25, 2023</span>
            </div>
          </div>
          <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">
              Great experience from start to finish. Professional, efficient, and always
              available for questions. Truly appreciated the follow-up care.
            </p>
            <div class="testimonial-author">
              <strong>Michael Clark</strong>
              <span>Sept 15, 2023</span>
            </div>
          </div>
        </div>
       </div> 
    </div>

    <button class="slider-btn right" id="btn-next">&#10095;</button>
  </div>
</section>


<section class="contact-section reveal" id="contacto">
  <div class="contact-container">
    <div class="contact-header">
      <h2>Empecemos ahora</h2>
      <p>
        Recibe asesoría especializada para garantizar una implementación y validación eficiente
      </p>
    </div>

    <div class="contact-grid">
      <!-- Formulario -->
      <form id="contactForm" class="contact-form ajax-form" method="POST" action="php/procesarForm.php"> <!-- cualquier fomr que necesite mensaje flotante indcluir class ajax -->
        <h3>Envíanos un mensaje</h3>

        <label for="name">Nombre*</label>
        <input type="text" id="name" name="name" required placeholder="Nombre completo">

        <label for="phone">Teléfono</label>
        <input type="tel" id="phone" name="phone" placeholder="Tu teléfono">

        <label for="email">Email*</label>
        <input type="email" id="email" name="email" required placeholder="Tú correo">

        <label for="company">Empresa*</label>
        <input type="text" id="company" name="company" required placeholder="Su empresa">

        <label for="service">Servicio*</label>
        <select id="service" name="service" required>
          <option value="">Seleccione una opción</option>
          <option value="implementation-validation">Implementacion & Validacion</option>
          <option value="validation">Validacion</option>
        </select>

        <label for="message" id="submit-btn">Mensaje</label>
        <textarea id="message" name="message" rows="4" placeholder="Escribe tu mensaje..."></textarea>

        <button type="submit">Enviar</button>
        <p id="form-status" class="form-status"></p>
      </form>

      <!-- Información de contacto -->
      <div class="contact-info">
        <span class="tag-secondary">Tu base de datos a un clic</span>
        <h3>Solicita una reunión con nuestro equipo</h3>
        <p>
          Nuestro equipo está aquí para guiarte. 
          Da el primer paso y agenda una conversación con nosotros hoy mismo.
        </p>
        <p><strong>Dirección:</strong><br>Calle 02 de Mayo, Miraflores, Lima, Perú</p>
        <p><strong>Teléfono:</strong><br>(+51) 924-326-148</p>
        <p><strong>Email:</strong><br><a href="mailto:contact@example.com">contact@alessadatabase.cloud</a></p>
      </div>
    </div>
  </div>
</section>


<!-- Botón flotante de WhatsApp -->
<a href="https://wa.link/nfb1wc" 
   class="whatsapp-float" 
   target="_blank" 
   aria-label="Chat en WhatsApp">
  <img src="Images/wsp-icon.png" alt="WhatsApp" />
</a>

<!-- Mensaje flotante confirmando envio formulario-->
<div id="toastBox" class="toast">
  <span id="toastMessage"></span>
  <button id="toastClose">×</button>
</div>

<!-- Importar el script del slider y otros -->
<script src="slider.js"></script>
<script src="dropdiv.js?v=4"></script>
<script src="msgajax.js"></script>
<script src="mobile-menu.js"></script>
<script src="reveal.js"></script>

<!-- Inicializar el slider -->
<script>
  initSlider({
    containerSelector: ".slider-container",
    slideSelector: ".slide",
    prevBtnSelector: "#btn-prev",
    nextBtnSelector: "#btn-next",
    interval: 3000
  });
  
  initAccordion(".faq-section", false); // Solo permite un abierto; colocar ", true" para varios abiertos

  initSlider({
    containerSelector: ".testimonials-slider",
    slideSelector: ".slide",
    prevBtnSelector: "#btn-prev",
    nextBtnSelector: "#btn-next",
    interval: 3000
  });

  // Toggle navbar contrast on blue sections
  document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.querySelector(".navbar");
    const sections = document.querySelectorAll("section, footer, header");
    
    const checkNavbarContrast = () => {
      let isOverBlue = false;
      const navRect = navbar.getBoundingClientRect();
      const navCenterY = navRect.top + (navRect.height / 2);

      sections.forEach(sec => {
        const rect = sec.getBoundingClientRect();
        if (navCenterY >= rect.top && navCenterY <= rect.bottom) {
          if (sec.id === "hero" || sec.id === "workflow" || sec.classList.contains("footer") || sec.tagName.toLowerCase() === "footer") {
            isOverBlue = true;
          }
        }
      });
      
      if (isOverBlue) {
        navbar.classList.add("navbar-light-contrast");
      } else {
        navbar.classList.remove("navbar-light-contrast");
      }
    };

    window.addEventListener("scroll", checkNavbarContrast);
    window.addEventListener("resize", checkNavbarContrast);
    checkNavbarContrast(); // initial check
  });

</script>

</body>

<footer class="footer reveal">
  <div class="footer-container">
    <!-- Columna 1: Identidad -->
    <div class="footer-logo-section">
      <div class="footer-brand">
        <img src="Images/logo blanco.png" alt="Alessa Logo Blanco" class="footer-logo-img">
        <h3>Alessa Database</h3>
      </div>
      <p class="footer-description">
        Sistema de Gestión Integral en Farmacovigilancia basado en la nube - 
        (Automated Learning and Evaluation System for Safety Assessment – Cloud Data Platform)
      </p>
      <div class="footer-social">
        <a href="#" aria-label="Facebook"><img src="Images/icon-facebook.png" alt="Facebook"></a>
        <a href="#" aria-label="LinkedIn"><img src="Images/icon-linkedin.png" alt="LinkedIn"></a>
        <a href="#" aria-label="Twitter"><img src="Images/icon-twitter.png" alt="Twitter"></a>
      </div>
    </div>

    <!-- Columna 2: Enlaces -->
    <div class="footer-links">
      <h4>Enlaces</h4>
      <ul>
        <li><a href="#hero">Principal</a></li>
        <li><a href="#sobre-nosotros">Acerca de</a></li>
        <li><a href="#caracteristicas">Características</a></li>
        <li><a href="#workflow">Workflow</a></li>
        <li><a href="#beneficios">Beneficios</a></li>
        <li><a href="#faq">Preguntas</a></li>
        <li><a href="#testimonios">Testimonios</a></li>
        <li><a href="#contacto">Contáctanos</a></li>
      </ul>
    </div>

    <!-- Columna 3: Legal -->
    <div class="footer-links">
      <h4>Legal y Cumplimiento</h4>
      <ul>
        <li><a href="#">Política de Privacidad</a></li>
        <li><a href="#">Términos y Condiciones</a></li>
        <li><a href="#">Certificaciones</a></li>
      </ul>
    </div>

    <!-- Columna 4: Contacto -->
    <div class="footer-contact">
      <h4>Contáctanos</h4>
      <p><strong>Email:</strong> <a href="mailto:contact@alessadatabase.cloud">contact@alessadatabase.cloud</a></p>
      <p><strong>Teléfono:</strong> (+51) 924-326-148</p>
      
      <div class="language-selector">
        <label for="lang-select">Idioma:</label>
        <select id="lang-select">
          <option value="es" selected>Español</option>
          <option value="en">English</option>
          <option value="pt">Português</option>
        </select>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Alessa Database — Respaldado por <strong>Conkomerco</strong></p>
  </div>
</footer>

</html>
