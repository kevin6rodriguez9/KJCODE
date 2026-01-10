// ============================================
// KJCODE - Contact Page JavaScript
// ============================================

// Menú Responsive
const botonMenu = document.getElementById("botonMenu");
const enlacesNavegacion = document.getElementById("enlacesNavegacion");

botonMenu.addEventListener("click", () => {
  enlacesNavegacion.classList.toggle("activo");
});

// Cerrar menú al hacer click en un enlace
enlacesNavegacion.querySelectorAll("a").forEach((enlace) => {
  enlace.addEventListener("click", () => {
    enlacesNavegacion.classList.remove("activo");
  });
});

// ============================================
// Sistema de Alertas
// ============================================

function mostrarAlerta(tipo, mensaje) {
  // Crear elemento de alerta
  const alerta = document.createElement("div");
  alerta.className = `alert ${tipo}`;

  const icono = tipo === "success" ? "✓" : "✕";

  alerta.innerHTML = `
    <div class="alert-content">
      <span class="alert-icon">${icono}</span>
      <p>${mensaje}</p>
    </div>
  `;

  document.body.appendChild(alerta);

  // Mostrar alerta con animación
  setTimeout(() => {
    alerta.classList.add("show");
  }, 100);

  // Ocultar y eliminar después de 4 segundos
  setTimeout(() => {
    alerta.classList.remove("show");
    setTimeout(() => {
      alerta.remove();
    }, 500);
  }, 4000);
}

// ============================================
// Validación y Envío del Formulario
// ============================================

const formularioContacto = document.getElementById("formularioContacto");
const inputs = formularioContacto.querySelectorAll("input, textarea");

// Efecto visual al escribir en los inputs
inputs.forEach((input) => {
  input.addEventListener("focus", function () {
    this.style.transform = "scale(1.01)";
    this.style.transition = "all 0.3s ease";
  });

  input.addEventListener("blur", function () {
    this.style.transform = "scale(1)";
  });

  input.addEventListener("input", function () {
    if (this.value.length > 0) {
      this.style.borderColor = "var(--primary-light)";
    } else {
      this.style.borderColor = "rgba(122, 0, 255, 0.2)";
    }
  });
});

// Validación y envío del formulario
formularioContacto.addEventListener("submit", function (e) {
  e.preventDefault();

  // Obtener valores
  const nombre = document.getElementById("nombre").value.trim();
  const email = document.getElementById("email").value.trim();
  const asunto = document.getElementById("asunto").value.trim();
  const mensaje = document.getElementById("mensaje").value.trim();

  // Validación simple
  if (!nombre) {
    mostrarAlerta("error", "Por favor, ingresa tu nombre completo");
    document.getElementById("nombre").focus();
    return;
  }

  if (!email) {
    mostrarAlerta("error", "Por favor, ingresa tu correo electrónico");
    document.getElementById("email").focus();
    return;
  }

  // Validar formato de email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    mostrarAlerta("error", "Por favor, ingresa un correo electrónico válido");
    document.getElementById("email").focus();
    return;
  }

  if (!asunto) {
    mostrarAlerta("error", "Por favor, ingresa el asunto del mensaje");
    document.getElementById("asunto").focus();
    return;
  }

  if (!mensaje) {
    mostrarAlerta("error", "Por favor, escribe tu mensaje");
    document.getElementById("mensaje").focus();
    return;
  }

  if (mensaje.length < 10) {
    mostrarAlerta("error", "El mensaje debe tener al menos 10 caracteres");
    document.getElementById("mensaje").focus();
    return;
  }

  // Simular envío
  const botonEnviar = formularioContacto.querySelector(".botonEnviar");
  botonEnviar.disabled = true;
  botonEnviar.textContent = "Enviando...";

  setTimeout(() => {
    mostrarAlerta(
      "success",
      "¡Mensaje enviado con éxito! Te contactaremos pronto."
    );
    formularioContacto.reset();

    // Restaurar botón
    botonEnviar.disabled = false;
    botonEnviar.textContent = "Enviar Mensaje";

    // Resetear estilos de los inputs
    inputs.forEach((input) => {
      input.style.borderColor = "rgba(122, 0, 255, 0.2)";
    });
  }, 1500);
});

// ============================================
// Cerrar menú al hacer click fuera de él
// ============================================

document.addEventListener("click", (e) => {
  if (!botonMenu.contains(e.target) && !enlacesNavegacion.contains(e.target)) {
    enlacesNavegacion.classList.remove("activo");
  }
});
