// ============================================
// KJCODE - Index Page JavaScript Mejorado
// ============================================

// ============================================
// 1. MENÚ RESPONSIVE MEJORADO
// ============================================

const botonMenu = document.getElementById("botonMenu");
const enlacesNavegacion = document.getElementById("enlacesNavegacion");
const cabecera = document.getElementById("cabecera");

// Abrir/cerrar menú al hacer click en el botón
if (botonMenu && enlacesNavegacion) {
  botonMenu.addEventListener("click", (e) => {
    e.stopPropagation();
    enlacesNavegacion.classList.toggle("activo");
    botonMenu.classList.toggle("activo");

    // Prevenir scroll cuando el menú está abierto
    if (enlacesNavegacion.classList.contains("activo")) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "";
    }
  });

  // Cerrar menú al hacer click en un enlace
  enlacesNavegacion.querySelectorAll("a").forEach((enlace) => {
    enlace.addEventListener("click", () => {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    });
  });

  // Cerrar menú al hacer click fuera de él
  document.addEventListener("click", (e) => {
    if (
      !botonMenu.contains(e.target) &&
      !enlacesNavegacion.contains(e.target) &&
      enlacesNavegacion.classList.contains("activo")
    ) {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    }
  });

  // Cerrar menú con tecla ESC
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && enlacesNavegacion.classList.contains("activo")) {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    }
  });
}

// ============================================
// 2. EFECTO DE SCROLL EN EL HEADER MEJORADO
// ============================================

let scrollAnterior = window.pageYOffset;
let ticking = false;

function actualizarHeader() {
  const scrollActual = window.pageYOffset;

  // Agregar clase 'scrolled' cuando se hace scroll
  if (scrollActual > 50) {
    cabecera.classList.add("scrolled");
  } else {
    cabecera.classList.remove("scrolled");
  }

  scrollAnterior = scrollActual;
  ticking = false;
}

window.addEventListener("scroll", () => {
  if (!ticking) {
    window.requestAnimationFrame(actualizarHeader);
    ticking = true;
  }
});

// ============================================
// 3. ANIMACIÓN INTERSECTION OBSERVER (MODERNA)
// ============================================

// Configuración del Intersection Observer
const observerOptions = {
  threshold: 0.15,
  rootMargin: "0px 0px -50px 0px",
};

// Callback del observer
const observerCallback = (entries) => {
  entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
      // Agregar delay escalonado basado en el índice
      const delay = entry.target.dataset.delay || 0;

      setTimeout(() => {
        entry.target.classList.add("visible");
      }, delay);

      // Dejar de observar el elemento después de animarlo
      observer.unobserve(entry.target);
    }
  });
};

// Crear el observer
const observer = new IntersectionObserver(observerCallback, observerOptions);

// Observar todos los elementos animables
function inicializarAnimaciones() {
  // Seleccionar elementos que deben animarse
  const elementosAnimables = document.querySelectorAll(
    ".servicioCard, .proyectoCard, .seccionHeader"
  );

  elementosAnimables.forEach((elemento, index) => {
    // Establecer delay para efecto escalonado
    if (
      elemento.classList.contains("servicioCard") ||
      elemento.classList.contains("proyectoCard")
    ) {
      elemento.dataset.delay = index * 100;
    }

    // Observar el elemento
    observer.observe(elemento);
  });
}

// ============================================
// 4. ANIMACIÓN SUAVE AL CARGAR LA PÁGINA
// ============================================

window.addEventListener("load", () => {
  // Inicializar animaciones de scroll
  inicializarAnimaciones();

  // Animar hero content si existe
  const heroContenido = document.querySelector(".heroTexto");
  if (heroContenido) {
    heroContenido.style.opacity = "1";
    heroContenido.style.transform = "translateY(0)";
  }
});

// ============================================
// 5. SCROLL SUAVE PARA ENLACES INTERNOS
// ============================================

document.querySelectorAll('a[href^="#"]').forEach((enlace) => {
  enlace.addEventListener("click", function (e) {
    const href = this.getAttribute("href");

    // Ignorar enlaces con solo '#'
    if (href === "#") {
      e.preventDefault();
      return;
    }

    const destino = document.querySelector(href);

    if (destino) {
      e.preventDefault();

      // Calcular posición considerando el header fijo
      const offsetTop = destino.offsetTop - 100;

      window.scrollTo({
        top: offsetTop,
        behavior: "smooth",
      });
    }
  });
});

// ============================================
// 6. EFECTOS DE HOVER EN CARDS (OPCIONAL)
// ============================================

// Efecto de paralaje suave en las cards
function agregarEfectoParalaje() {
  const cards = document.querySelectorAll(".servicioCard, .proyectoCard");

  cards.forEach((card) => {
    card.addEventListener("mousemove", (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateX = (y - centerY) / 20;
      const rotateY = (centerX - x) / 20;

      card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
    });

    card.addEventListener("mouseleave", () => {
      card.style.transform = "";
    });
  });
}

// Inicializar efecto paralaje después de que las cards sean visibles
setTimeout(agregarEfectoParalaje, 500);

// ============================================
// 7. PERFORMANCE: REDUCIR ANIMACIONES EN DISPOSITIVOS LENTOS
// ============================================

// Detectar si el usuario prefiere movimiento reducido
const prefersReducedMotion = window.matchMedia(
  "(prefers-reduced-motion: reduce)"
);

if (prefersReducedMotion.matches) {
  // Desactivar animaciones complejas
  document.body.classList.add("reduced-motion");
}

// ============================================
// 8. LAZY LOADING PARA IMÁGENES (OPCIONAL)
// ============================================

// Si tienes imágenes, puedes usar lazy loading nativo
document.addEventListener("DOMContentLoaded", () => {
  const imagenes = document.querySelectorAll("img[data-src]");

  if ("IntersectionObserver" in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.removeAttribute("data-src");
          imageObserver.unobserve(img);
        }
      });
    });

    imagenes.forEach((img) => imageObserver.observe(img));
  } else {
    // Fallback para navegadores sin soporte
    imagenes.forEach((img) => {
      img.src = img.dataset.src;
    });
  }
});

// ============================================
// 9. ANIMACIÓN DEL SCROLL INDICATOR
// ============================================

const scrollIndicador = document.querySelector(".scrollIndicador");

if (scrollIndicador) {
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
      scrollIndicador.style.opacity = "0";
      scrollIndicador.style.pointerEvents = "none";
    } else {
      scrollIndicador.style.opacity = "1";
      scrollIndicador.style.pointerEvents = "auto";
    }
  });

  // Click en el indicador para hacer scroll
  scrollIndicador.addEventListener("click", () => {
    const primeraSeccion = document.querySelector(".serviciosDestacados");
    if (primeraSeccion) {
      primeraSeccion.scrollIntoView({ behavior: "smooth" });
    }
  });
}

// ============================================
// 10. PREVENIR FLASH DE CONTENIDO NO ESTILIZADO
// ============================================

document.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add("loaded");
});

// ============================================
// 11. DEBUGGING (SOLO PARA DESARROLLO)
// ============================================

// Descomentar para ver cuándo se activan las animaciones
/*
const observerDebug = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      console.log('Elemento visible:', entry.target.className);
    }
  });
}, observerOptions);

document.querySelectorAll('.servicioCard, .proyectoCard').forEach(el => {
  observerDebug.observe(el);
});
*/

// ============================================
// 12. OPTIMIZACIÓN: THROTTLE PARA RESIZE
// ============================================

let resizeTimer;
window.addEventListener("resize", () => {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    // Reinicializar elementos si es necesario
    if (window.innerWidth > 768) {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    }
  }, 250);
});

// ============================================
// FIN DEL SCRIPT
// ============================================

console.log("✅ KJCODE - Scripts cargados correctamente");
