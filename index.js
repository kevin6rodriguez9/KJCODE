// ============================================
// KJCODE - Index Page JavaScript
// ============================================

// ============================================
// 1. MENÚ RESPONSIVE
// ============================================

const botonMenu = document.getElementById("botonMenu");
const enlacesNavegacion = document.getElementById("enlacesNavegacion");

// Abrir/cerrar menú al hacer click en el botón
botonMenu.addEventListener("click", () => {
  enlacesNavegacion.classList.toggle("activo");
});

// Cerrar menú al hacer click en un enlace
enlacesNavegacion.querySelectorAll("a").forEach((enlace) => {
  enlace.addEventListener("click", () => {
    enlacesNavegacion.classList.remove("activo");
  });
});

// Cerrar menú al hacer click fuera de él
document.addEventListener("click", (e) => {
  if (!botonMenu.contains(e.target) && !enlacesNavegacion.contains(e.target)) {
    enlacesNavegacion.classList.remove("activo");
  }
});

// ============================================
// 2. EFECTO DE SCROLL EN EL HEADER
// ============================================

const cabecera = document.getElementById("cabecera");
let scrollAnterior = window.pageYOffset;

window.addEventListener("scroll", () => {
  const scrollActual = window.pageYOffset;

  // Cambiar fondo del header al hacer scroll
  if (scrollActual > 50) {
    cabecera.style.background = "rgba(0, 0, 0, 0.95)";
    cabecera.style.boxShadow = "0 5px 20px rgba(122, 0, 255, 0.3)";
  } else {
    cabecera.style.background = "rgba(0, 0, 0, 0.8)";
    cabecera.style.boxShadow = "none";
  }

  scrollAnterior = scrollActual;
});

// ============================================
// 3. ANIMACIÓN FADE-IN PARA CARTAS
// ============================================

// Función para verificar si un elemento está visible en la pantalla
function estaVisible(elemento) {
  const rect = elemento.getBoundingClientRect();
  const windowHeight =
    window.innerHeight || document.documentElement.clientHeight;

  return (
    rect.top <= windowHeight * 0.85 && // Elemento entra al 85% de la pantalla
    rect.bottom >= 0
  );
}

// Función para animar elementos cuando aparecen
function animarAlScroll() {
  // Seleccionar todas las cartas
  const servicioCartas = document.querySelectorAll(".servicioCarta");
  const proyectoCartas = document.querySelectorAll(".proyectoCarta");

  // Combinar todas las cartas en un solo array
  const todasLasCartas = [...servicioCartas, ...proyectoCartas];

  todasLasCartas.forEach((carta, index) => {
    if (estaVisible(carta) && !carta.classList.contains("visible")) {
      // Agregar clase con delay para efecto escalonado
      setTimeout(() => {
        carta.classList.add("visible");
        carta.style.opacity = "1";
        carta.style.transform = "translateY(0)";
      }, index * 100); // 100ms de diferencia entre cada carta
    }
  });
}

// Preparar las cartas para la animación
function prepararCartas() {
  const servicioCartas = document.querySelectorAll(".servicioCarta");
  const proyectoCartas = document.querySelectorAll(".proyectoCarta");
  const todasLasCartas = [...servicioCartas, ...proyectoCartas];

  todasLasCartas.forEach((carta) => {
    carta.style.opacity = "0";
    carta.style.transform = "translateY(30px)";
    carta.style.transition = "all 0.6s ease";
  });
}

// Ejecutar preparación al cargar la página
window.addEventListener("load", () => {
  prepararCartas();
  animarAlScroll();
});

// Ejecutar animación al hacer scroll
window.addEventListener("scroll", animarAlScroll);

// ============================================
// 4. EFECTOS SUAVES EN BOTONES
// ============================================

// Seleccionar todos los botones
const botones = document.querySelectorAll(".boton");

botones.forEach((boton) => {
  // Efecto al pasar el mouse
  boton.addEventListener("mouseenter", function () {
    this.style.transform = "translateY(-3px)";
    this.style.transition = "all 0.3s ease";
  });

  boton.addEventListener("mouseleave", function () {
    this.style.transform = "translateY(0)";
  });

  // Efecto al hacer click
  boton.addEventListener("mousedown", function () {
    this.style.transform = "translateY(0) scale(0.98)";
  });

  boton.addEventListener("mouseup", function () {
    this.style.transform = "translateY(-3px) scale(1)";
  });
});

// ============================================
// 5. ANIMACIÓN SUAVE AL CARGAR LA PÁGINA
// ============================================

window.addEventListener("load", () => {
  // Animar el contenido principal
  const contenidoEncabezado = document.querySelector(".contenidoEncabezado");

  if (contenidoEncabezado) {
    contenidoEncabezado.style.opacity = "0";
    contenidoEncabezado.style.transform = "translateY(20px)";

    setTimeout(() => {
      contenidoEncabezado.style.transition = "all 0.8s ease";
      contenidoEncabezado.style.opacity = "1";
      contenidoEncabezado.style.transform = "translateY(0)";
    }, 100);
  }
});

// ============================================
// 6. SCROLL SUAVE PARA ENLACES INTERNOS
// ============================================

document.querySelectorAll('a[href^="#"]').forEach((enlace) => {
  enlace.addEventListener("click", function (e) {
    e.preventDefault();

    const destino = document.querySelector(this.getAttribute("href"));

    if (destino) {
      destino.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  });
});
