// ============================================
// KJCODE - Nosotros Page JavaScript
// ============================================

// ============================================
// 1. MENÚ RESPONSIVE
// ============================================

function toggleMenu() {
  const botonMenu = document.getElementById("botonMenu");
  const enlacesNavegacion = document.getElementById("enlacesNavegacion");

  // Abrir/cerrar menú
  botonMenu.addEventListener("click", () => {
    enlacesNavegacion.classList.toggle("activo");
  });

  // Cerrar menú al hacer click en enlaces
  enlacesNavegacion.querySelectorAll("a").forEach((enlace) => {
    enlace.addEventListener("click", () => {
      enlacesNavegacion.classList.remove("activo");
    });
  });

  // Cerrar menú al hacer click fuera
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
// 2. ANIMACIONES DE SCROLL CON INTERSECTION OBSERVER
// ============================================

function activarAnimacionesScroll() {
  // Seleccionar todos los elementos a animar
  const elementosAnimar = document.querySelectorAll(
    ".contenidoNosotros, .cartaMVV, .valor, .equipoMiembro"
  );

  // Configurar estilos iniciales
  elementosAnimar.forEach((elemento) => {
    elemento.style.opacity = "0";
    elemento.style.transform = "translateY(40px)";
    elemento.style.transition = "all 0.8s ease";
  });

  // Configurar IntersectionObserver
  const opciones = {
    threshold: 0.15, // Se activa cuando el 15% del elemento es visible
    rootMargin: "0px 0px -50px 0px", // Margen para activar antes
  };

  const observer = new IntersectionObserver((entradas) => {
    entradas.forEach((entrada, index) => {
      if (entrada.isIntersecting) {
        // Añadir delay escalonado para efecto de cascada
        setTimeout(() => {
          entrada.target.style.opacity = "1";
          entrada.target.style.transform = "translateY(0)";
        }, index * 100); // 100ms de diferencia entre elementos

        // Dejar de observar una vez animado
        observer.unobserve(entrada.target);
      }
    });
  }, opciones);

  // Observar cada elemento
  elementosAnimar.forEach((elemento) => {
    observer.observe(elemento);
  });
}

// ============================================
// 3. EFECTOS HOVER MEJORADOS CON JS
// ============================================

function mejorarEfectosHover() {
  // Seleccionar tarjetas
  const tarjetas = document.querySelectorAll(".cartaMVV, .equipoMiembro");

  tarjetas.forEach((tarjeta) => {
    // Evento al entrar el mouse
    tarjeta.addEventListener("mouseenter", function () {
      this.style.transition =
        "all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)";
      this.style.transform = "translateY(-12px) scale(1.02)";
    });

    // Evento al salir el mouse
    tarjeta.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)";
    });

    // Efecto de inclinación suave al mover el mouse
    tarjeta.addEventListener("mousemove", function (e) {
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateX = (y - centerY) / 20;
      const rotateY = (centerX - x) / 20;

      this.style.transform = `translateY(-12px) scale(1.02) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });

    // Resetear al salir
    tarjeta.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1) rotateX(0) rotateY(0)";
    });
  });

  // Efecto para los valores
  const valores = document.querySelectorAll(".valor");

  valores.forEach((valor) => {
    valor.addEventListener("mouseenter", function () {
      this.style.transition = "all 0.3s ease";
      this.style.transform = "translateX(15px) scale(1.03)";
    });

    valor.addEventListener("mouseleave", function () {
      this.style.transform = "translateX(0) scale(1)";
    });
  });
}

// ============================================
// 4. BOTÓN FLOTANTE PARA VOLVER ARRIBA
// ============================================

function crearBotonScroll() {
  // Crear el botón
  const boton = document.createElement("button");
  boton.innerHTML = "↑";
  boton.className = "botonScrollTop";

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

  // Agregar al body
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

  // Efecto hover
  boton.addEventListener("mouseenter", () => {
    boton.style.transform = "scale(1.15) translateY(-3px)";
    boton.style.boxShadow = "0 12px 35px rgba(122, 0, 255, 0.6)";
  });

  boton.addEventListener("mouseleave", () => {
    boton.style.transform = "scale(1)";
    boton.style.boxShadow = "0 8px 25px rgba(122, 0, 255, 0.4)";
  });

  // Acción de click: scroll suave al inicio
  boton.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });

    // Efecto de click
    boton.style.transform = "scale(0.95)";
    setTimeout(() => {
      boton.style.transform = "scale(1)";
    }, 150);
  });
}

// ============================================
// 5. ANIMACIÓN DEL HEADER AL HACER SCROLL
// ============================================

function animarHeader() {
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
// 6. ANIMACIÓN INICIAL DE LA PÁGINA
// ============================================

function animarCargaPagina() {
  // Animar el encabezado principal
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
// 7. EFECTO EN BOTONES DE CONTACTO
// ============================================

function animarBotonesContacto() {
  const botones = document.querySelectorAll(".botonContacto");

  botones.forEach((boton) => {
    boton.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-4px) scale(1.05)";
    });

    boton.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)";
    });

    boton.addEventListener("mousedown", function () {
      this.style.transform = "translateY(0) scale(0.97)";
    });

    boton.addEventListener("mouseup", function () {
      this.style.transform = "translateY(-4px) scale(1.05)";
    });
  });
}

// ============================================
// 8. INICIALIZACIÓN
// ============================================

function init() {
  // Esperar a que el DOM esté completamente cargado
  document.addEventListener("DOMContentLoaded", () => {
    toggleMenu();
    activarAnimacionesScroll();
    mejorarEfectosHover();
    crearBotonScroll();
    animarHeader();
    animarCargaPagina();
    animarBotonesContacto();

    console.log('✅ KJCODE - Página "Nosotros" cargada correctamente');
  });
}

// Inicializar todo
init();
