// ============================================
// KJCODE - Nosotros Page JavaScript Mejorado
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
// 2. EFECTO DE SCROLL EN EL HEADER
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
// 3. INTERSECTION OBSERVER PARA ANIMACIONES
// ============================================

// Configuración del Intersection Observer
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -80px 0px",
};

// Callback del observer
const observerCallback = (entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      // Obtener el delay del elemento
      const delay = entry.target.dataset.delay || 0;

      setTimeout(() => {
        entry.target.classList.add("visible");
      }, delay);

      // Dejar de observar después de animar
      observer.unobserve(entry.target);
    }
  });
};

// Crear el observer
const observer = new IntersectionObserver(observerCallback, observerOptions);

// Función para inicializar animaciones
function inicializarAnimaciones() {
  // Seleccionar todos los elementos con atributo data-aos
  const elementosAOS = document.querySelectorAll("[data-aos]");

  elementosAOS.forEach((elemento) => {
    observer.observe(elemento);
  });

  // Seleccionar elementos específicos
  const elementosAnimables = document.querySelectorAll(
    ".mvCard, .valorCard, .equipoCard"
  );

  elementosAnimables.forEach((elemento) => {
    observer.observe(elemento);
  });
}

// ============================================
// 4. ANIMACIÓN DE NÚMEROS (STATS)
// ============================================

function animarNumeros() {
  const stats = document.querySelectorAll(".statNumero");

  const observerStats = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const target = entry.target;
          const text = target.textContent;
          const numero = parseInt(text);

          if (!isNaN(numero)) {
            animarContador(target, 0, numero, 2000);
          }

          observerStats.unobserve(target);
        }
      });
    },
    { threshold: 0.5 }
  );

  stats.forEach((stat) => {
    observerStats.observe(stat);
  });
}

function animarContador(elemento, inicio, fin, duracion) {
  const rango = fin - inicio;
  const incremento = rango / (duracion / 16);
  let actual = inicio;

  const timer = setInterval(() => {
    actual += incremento;

    if (actual >= fin) {
      elemento.textContent =
        fin +
        (elemento.textContent.includes("+") ? "+" : "") +
        (elemento.textContent.includes("%") ? "%" : "");
      clearInterval(timer);
    } else {
      elemento.textContent =
        Math.floor(actual) +
        (elemento.textContent.includes("+") ? "+" : "") +
        (elemento.textContent.includes("%") ? "%" : "");
    }
  }, 16);
}

// ============================================
// 5. EFECTO PARALLAX EN CARDS
// ============================================

function agregarEfectoParallax() {
  const cards = document.querySelectorAll(".mvCard, .equipoCard");

  // Solo agregar efecto en dispositivos con mouse (no móviles)
  if (window.matchMedia("(hover: hover)").matches) {
    cards.forEach((card) => {
      card.addEventListener("mousemove", (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = (y - centerY) / 20;
        const rotateY = (centerX - x) / 20;

        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
      });

      card.addEventListener("mouseleave", () => {
        card.style.transform = "";
      });
    });
  }
}

// ============================================
// 6. SCROLL SUAVE PARA INDICADOR
// ============================================

const scrollIndicador = document.querySelector(".scrollIndicador");

if (scrollIndicador) {
  // Ocultar al hacer scroll
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
      scrollIndicador.style.opacity = "0";
      scrollIndicador.style.pointerEvents = "none";
    } else {
      scrollIndicador.style.opacity = "1";
      scrollIndicador.style.pointerEvents = "auto";
    }
  });

  // Click para hacer scroll a la primera sección
  scrollIndicador.addEventListener("click", () => {
    const primeraSeccion = document.querySelector(".seccionHistoria");
    if (primeraSeccion) {
      primeraSeccion.scrollIntoView({ behavior: "smooth" });
    }
  });
}

// ============================================
// 7. SCROLL SUAVE PARA ENLACES INTERNOS
// ============================================

document.querySelectorAll('a[href^="#"]').forEach((enlace) => {
  enlace.addEventListener("click", function (e) {
    const href = this.getAttribute("href");

    if (href === "#") {
      e.preventDefault();
      return;
    }

    const destino = document.querySelector(href);

    if (destino) {
      e.preventDefault();
      const offsetTop = destino.offsetTop - 100;

      window.scrollTo({
        top: offsetTop,
        behavior: "smooth",
      });
    }
  });
});

// ============================================
// 8. BOTÓN "VOLVER ARRIBA"
// ============================================

function crearBotonScrollTop() {
  // Crear el botón
  const boton = document.createElement("button");
  boton.innerHTML = "↑";
  boton.className = "botonScrollTop";
  boton.setAttribute("aria-label", "Volver arriba");

  // Estilos del botón
  Object.assign(boton.style, {
    position: "fixed",
    bottom: "30px",
    right: "30px",
    width: "55px",
    height: "55px",
    borderRadius: "50%",
    border: "2px solid #7a00ff",
    background: "linear-gradient(135deg, #7a00ff, #5500b8)",
    color: "#ffffff",
    fontSize: "24px",
    fontWeight: "bold",
    cursor: "pointer",
    opacity: "0",
    visibility: "hidden",
    transition: "all 0.4s ease",
    zIndex: "999",
    boxShadow: "0 8px 25px rgba(122, 0, 255, 0.4)",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
  });

  document.body.appendChild(boton);

  // Mostrar/ocultar según scroll
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 500) {
      boton.style.opacity = "1";
      boton.style.visibility = "visible";
      boton.style.transform = "scale(1)";
    } else {
      boton.style.opacity = "0";
      boton.style.visibility = "hidden";
      boton.style.transform = "scale(0.8)";
    }
  });

  // Efecto hover
  boton.addEventListener("mouseenter", () => {
    boton.style.transform = "scale(1.15) translateY(-3px)";
    boton.style.boxShadow = "0 12px 35px rgba(122, 0, 255, 0.6)";
  });

  boton.addEventListener("mouseleave", () => {
    boton.style.transform = "scale(1)";
    boton.style.boxShadow = "0 8px 25px rgba(122, 0, 255, 0.4)";
  });

  // Acción de click
  boton.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });

    boton.style.transform = "scale(0.95)";
    setTimeout(() => {
      boton.style.transform = "scale(1)";
    }, 150);
  });
}

// ============================================
// 9. PERFORMANCE: REDUCIR ANIMACIONES SI ES NECESARIO
// ============================================

const prefersReducedMotion = window.matchMedia(
  "(prefers-reduced-motion: reduce)"
);

if (prefersReducedMotion.matches) {
  document.body.classList.add("reduced-motion");
  // Desactivar animaciones complejas
}

// ============================================
// 10. OPTIMIZACIÓN: THROTTLE PARA RESIZE
// ============================================

let resizeTimer;
window.addEventListener("resize", () => {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    // Cerrar menú en pantallas grandes
    if (window.innerWidth > 768) {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    }
  }, 250);
});

// ============================================
// 11. INICIALIZACIÓN AL CARGAR LA PÁGINA
// ============================================

window.addEventListener("load", () => {
  // Inicializar todas las funciones
  inicializarAnimaciones();
  animarNumeros();

  // Esperar un poco antes de agregar efectos parallax
  setTimeout(() => {
    agregarEfectoParallax();
  }, 500);

  // Crear botón de scroll top
  crearBotonScrollTop();

  // Animar hero content
  const heroContenido = document.querySelector(".heroContenido");
  if (heroContenido) {
    heroContenido.style.opacity = "1";
    heroContenido.style.transform = "translateY(0)";
  }

  console.log("✅ KJCODE - Página Nosotros cargada correctamente");
});

// ============================================
// 12. PREVENIR FLASH DE CONTENIDO NO ESTILIZADO
// ============================================

document.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add("loaded");
});

// ============================================
// FIN DEL SCRIPT
// ============================================
