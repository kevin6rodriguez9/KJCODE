// ============================================
// KJCODE - Servicios Page JavaScript
// ============================================

// ============================================
// 1. MENÚ RESPONSIVE
// ============================================

function configurarMenuResponsive() {
  const botonMenu = document.getElementById("botonMenu");
  const enlacesNavegacion = document.getElementById("enlacesNavegacion");

  // Abrir/cerrar menú al hacer click en el botón
  botonMenu.addEventListener("click", () => {
    enlacesNavegacion.classList.toggle("activo");
  });

  // Cerrar menú al hacer click en cualquier enlace
  const enlaces = enlacesNavegacion.querySelectorAll("a");
  enlaces.forEach((enlace) => {
    enlace.addEventListener("click", () => {
      enlacesNavegacion.classList.remove("activo");
    });
  });

  // Cerrar menú al hacer click fuera de él
  document.addEventListener("click", (e) => {
    if (
      !botonMenu.contains(e.target) &&
      !enlacesNavegacion.contains(e.target)
    ) {
      enlacesNavegacion.classList.remove("activo");
    }
  });
}

// ============================================
// 2. EFECTOS EN CARTAS DE SERVICIO
// ============================================

function configurarEfectosCartas() {
  const cartas = document.querySelectorAll(".servicioCarta");

  cartas.forEach((carta) => {
    // Efecto hover en desktop
    carta.addEventListener("mouseenter", function () {
      this.style.transition =
        "all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)";
      this.style.transform = "translateY(-12px) scale(1.03)";
    });

    carta.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)";
    });

    // Efecto al hacer click/touch en móviles
    carta.addEventListener("click", function () {
      // Verificar si es un dispositivo táctil
      if ("ontouchstart" in window) {
        // Añadir efecto destacado
        this.style.transform = "translateY(-12px) scale(1.03)";
        this.style.borderColor = "var(--primary)";
        this.style.boxShadow = "0 25px 50px rgba(122, 0, 255, 0.4)";

        // Remover efecto después de medio segundo
        setTimeout(() => {
          this.style.transform = "translateY(0) scale(1)";
          this.style.borderColor = "rgba(122, 0, 255, 0.2)";
          this.style.boxShadow = "none";
        }, 500);
      }
    });

    // Efecto de brillo suave al mover el mouse sobre la carta
    carta.addEventListener("mousemove", function (e) {
      if (!("ontouchstart" in window)) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = (y - centerY) / 30;
        const rotateY = (centerX - x) / 30;

        this.style.transform = `translateY(-12px) scale(1.03) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
      }
    });

    carta.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1) rotateX(0) rotateY(0)";
    });
  });
}

// ============================================
// 3. ANIMACIÓN DE SCROLL (FADE-IN)
// ============================================

function configurarAnimacionScroll() {
  const cartas = document.querySelectorAll(".servicioCarta");

  // Configurar estilos iniciales para las cartas
  cartas.forEach((carta) => {
    carta.style.opacity = "0";
    carta.style.transform = "translateY(40px)";
    carta.style.transition = "all 0.7s ease";
  });

  // Configurar IntersectionObserver
  const opciones = {
    threshold: 0.2, // Se activa cuando el 20% de la carta es visible
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver((entradas) => {
    entradas.forEach((entrada, index) => {
      if (entrada.isIntersecting) {
        // Añadir delay escalonado para crear efecto de cascada
        setTimeout(() => {
          entrada.target.style.opacity = "1";
          entrada.target.style.transform = "translateY(0)";
        }, index * 150); // 150ms de diferencia entre cada carta

        // Dejar de observar después de animar
        observer.unobserve(entrada.target);
      }
    });
  }, opciones);

  // Observar todas las cartas
  cartas.forEach((carta) => {
    observer.observe(carta);
  });
}

// ============================================
// 4. EFECTO DE PULSO EN BOTÓN "COMENZAR PROYECTO"
// ============================================

function configurarPulsoBoton() {
  const boton = document.querySelector(".botonPrimario");

  if (!boton) return;

  // Crear e inyectar los estilos CSS para la animación de pulso
  const style = document.createElement("style");
  style.textContent = `
    @keyframes pulso {
      0% {
        transform: scale(1);
        box-shadow: 0 10px 30px rgba(122, 0, 255, 0.4);
      }
      50% {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(122, 0, 255, 0.7);
      }
      100% {
        transform: scale(1);
        box-shadow: 0 10px 30px rgba(122, 0, 255, 0.4);
      }
    }
    
    .pulso-activo {
      animation: pulso 0.8s ease-in-out;
    }
  `;
  document.head.appendChild(style);

  // Función para activar el pulso
  function activarPulso() {
    boton.classList.add("pulso-activo");

    // Remover la clase después de la animación
    setTimeout(() => {
      boton.classList.remove("pulso-activo");
    }, 800);
  }

  // Activar pulso cada 5 segundos
  setInterval(activarPulso, 5000);

  // Efecto hover mejorado
  boton.addEventListener("mouseenter", function () {
    this.style.transform = "translateY(-5px) scale(1.05)";
  });

  boton.addEventListener("mouseleave", function () {
    this.style.transform = "translateY(0) scale(1)";
  });

  // Efecto al hacer click
  boton.addEventListener("mousedown", function () {
    this.style.transform = "translateY(0) scale(0.98)";
  });

  boton.addEventListener("mouseup", function () {
    this.style.transform = "translateY(-5px) scale(1.05)";
  });
}

// ============================================
// 5. ANIMACIÓN DEL HEADER AL HACER SCROLL
// ============================================

function configurarAnimacionHeader() {
  const header = document.querySelector("header");

  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 50) {
      header.style.background = "rgba(0, 0, 0, 0.95)";
      header.style.boxShadow = "0 5px 20px rgba(122, 0, 255, 0.3)";
    } else {
      header.style.background = "rgba(0, 0, 0, 0.8)";
      header.style.boxShadow = "none";
    }
  });
}

// ============================================
// 6. ANIMACIÓN DE CARGA DE LA PÁGINA
// ============================================

function configurarAnimacionCarga() {
  const encabezado = document.querySelector(".encabezadoPagina");

  if (encabezado) {
    encabezado.style.opacity = "0";
    encabezado.style.transform = "translateY(30px)";

    setTimeout(() => {
      encabezado.style.transition = "all 1s ease";
      encabezado.style.opacity = "1";
      encabezado.style.transform = "translateY(0)";
    }, 200);
  }
}

// ============================================
// 7. BOTÓN FLOTANTE PARA VOLVER ARRIBA
// ============================================

function crearBotonVolverArriba() {
  // Crear el botón
  const boton = document.createElement("button");
  boton.innerHTML = "↑";
  boton.setAttribute("aria-label", "Volver arriba");

  // Estilos del botón
  Object.assign(boton.style, {
    position: "fixed",
    bottom: "30px",
    right: "30px",
    width: "55px",
    height: "55px",
    borderRadius: "50%",
    border: "2px solid var(--primary)",
    background: "linear-gradient(135deg, var(--primary), var(--primary-dark))",
    color: "var(--text)",
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
    if (window.pageYOffset > 400) {
      boton.style.opacity = "1";
      boton.style.visibility = "visible";
      boton.style.transform = "scale(1)";
    } else {
      boton.style.opacity = "0";
      boton.style.visibility = "hidden";
      boton.style.transform = "scale(0.8)";
    }
  });

  // Efectos hover
  boton.addEventListener("mouseenter", () => {
    boton.style.transform = "scale(1.15) translateY(-3px)";
    boton.style.boxShadow = "0 12px 35px rgba(122, 0, 255, 0.6)";
  });

  boton.addEventListener("mouseleave", () => {
    boton.style.transform = "scale(1)";
    boton.style.boxShadow = "0 8px 25px rgba(122, 0, 255, 0.4)";
  });

  // Scroll suave al hacer click
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
// 8. INICIALIZACIÓN
// ============================================

function inicializar() {
  // Esperar a que el DOM esté completamente cargado
  document.addEventListener("DOMContentLoaded", () => {
    configurarMenuResponsive();
    configurarEfectosCartas();
    configurarAnimacionScroll();
    configurarPulsoBoton();
    configurarAnimacionHeader();
    configurarAnimacionCarga();
    crearBotonVolverArriba();

    console.log('✅ KJCODE - Página "Servicios" cargada correctamente');
  });
}

// Ejecutar inicialización
inicializar();
