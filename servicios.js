// ============================================
// KJCODE - Servicios Page JavaScript
// Estilo igual a Nosotros
// ============================================

// ============================================
// 1. MENÚ RESPONSIVE MEJORADO
// ============================================

const botonMenu = document.getElementById("botonMenu");
const enlacesNavegacion = document.getElementById("enlacesNavegacion");
const cabecera = document.getElementById("cabecera");

if (botonMenu && enlacesNavegacion) {
  botonMenu.addEventListener("click", (e) => {
    e.stopPropagation();
    enlacesNavegacion.classList.toggle("activo");
    botonMenu.classList.toggle("activo");

    if (enlacesNavegacion.classList.contains("activo")) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "";
    }
  });

  enlacesNavegacion.querySelectorAll("a").forEach((enlace) => {
    enlace.addEventListener("click", () => {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    });
  });

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

let ticking = false;

function actualizarHeader() {
  const scrollActual = window.pageYOffset;

  if (scrollActual > 50) {
    cabecera.classList.add("scrolled");
  } else {
    cabecera.classList.remove("scrolled");
  }

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

const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -80px 0px",
};

const observerCallback = (entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const delay = entry.target.dataset.delay || 0;

      setTimeout(() => {
        entry.target.classList.add("visible");
      }, delay);

      observer.unobserve(entry.target);
    }
  });
};

const observer = new IntersectionObserver(observerCallback, observerOptions);

function inicializarAnimaciones() {
  const elementosAOS = document.querySelectorAll("[data-aos]");
  elementosAOS.forEach((elemento) => {
    observer.observe(elemento);
  });

  const elementosAnimables = document.querySelectorAll(
    ".servicioCard, .servicioAdicionalCard, .pasoCard"
  );
  elementosAnimables.forEach((elemento) => {
    observer.observe(elemento);
  });
}

// ============================================
// 4. EFECTO PARALLAX EN CARDS
// ============================================

function agregarEfectoParallax() {
  const cards = document.querySelectorAll(".servicioCard, .pasoCard");

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
// 5. SCROLL SUAVE PARA INDICADOR
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

  scrollIndicador.addEventListener("click", () => {
    const primeraSeccion = document.querySelector(".seccionServicios");
    if (primeraSeccion) {
      primeraSeccion.scrollIntoView({ behavior: "smooth" });
    }
  });
}

// ============================================
// 6. SCROLL SUAVE PARA ENLACES INTERNOS
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
// 7. BOTÓN "VOLVER ARRIBA"
// ============================================

function crearBotonScrollTop() {
  const boton = document.createElement("button");
  boton.innerHTML = "↑";
  boton.className = "botonScrollTop";
  boton.setAttribute("aria-label", "Volver arriba");

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

  boton.addEventListener("mouseenter", () => {
    boton.style.transform = "scale(1.15) translateY(-3px)";
    boton.style.boxShadow = "0 12px 35px rgba(122, 0, 255, 0.6)";
  });

  boton.addEventListener("mouseleave", () => {
    boton.style.transform = "scale(1)";
    boton.style.boxShadow = "0 8px 25px rgba(122, 0, 255, 0.4)";
  });

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
// 8. PERFORMANCE: REDUCIR ANIMACIONES SI ES NECESARIO
// ============================================

const prefersReducedMotion = window.matchMedia(
  "(prefers-reduced-motion: reduce)"
);

if (prefersReducedMotion.matches) {
  document.body.classList.add("reduced-motion");
}

// ============================================
// 9. OPTIMIZACIÓN: THROTTLE PARA RESIZE
// ============================================

let resizeTimer;
window.addEventListener("resize", () => {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    if (window.innerWidth > 768) {
      enlacesNavegacion.classList.remove("activo");
      botonMenu.classList.remove("activo");
      document.body.style.overflow = "";
    }
  }, 250);
});

// ============================================
// 10. INICIALIZACIÓN AL CARGAR LA PÁGINA
// ============================================

window.addEventListener("load", () => {
  inicializarAnimaciones();

  setTimeout(() => {
    agregarEfectoParallax();
  }, 500);

  crearBotonScrollTop();

  const heroContenido = document.querySelector(".heroContenido");
  if (heroContenido) {
    heroContenido.style.opacity = "1";
    heroContenido.style.transform = "translateY(0)";
  }

  console.log("✅ KJCODE - Página Servicios cargada correctamente");
});

// ============================================
// 11. PREVENIR FLASH DE CONTENIDO NO ESTILIZADO
// ============================================

document.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add("loaded");
});

// ============================================
// FIN DEL SCRIPT
// ============================================
