<?php
// Página Contacto - KJCODE
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KJCODE - Contacto</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --primary: #7a00ff;
  --primary-dark: #5500b8;
  --primary-light: #9933ff;
  --bg-dark: #0a0a0a;
  --bg-darker: #000000;
  --text: #ffffff;
  --text-gray: #b0b0b0;
}

body {
  font-family: "Poppins", sans-serif;
  background: var(--bg-dark);
  color: var(--text);
  overflow-x: hidden;
}

.fondoAnimado {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(
      90deg,
      rgba(122, 0, 255, 0.03) 1px,
      transparent 1px
    ),
    linear-gradient(rgba(122, 0, 255, 0.03) 1px, transparent 1px);
  background-size: 50px 50px;
  z-index: -1;
}

/* Header */
header {
  position: fixed;
  top: 0;
  width: 100%;
  padding: 20px 8%;
  background: rgba(0, 0, 0, 0.8);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid rgba(122, 0, 255, 0.2);
  z-index: 1000;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1400px;
  margin: 0 auto;
}

.logo {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  font-weight: 800;
  letter-spacing: 2px;
}

.logo img {
  max-height: 150px;
  width: auto;
  display: block;
}

.enlacesNavegacion {
  display: flex;
  gap: 40px;
  list-style: none;
}

.enlacesNavegacion a {
  color: var(--text);
  text-decoration: none;
  font-weight: 500;
  position: relative;
  transition: color 0.3s ease;
}

.enlacesNavegacion a::after {
  content: "";
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--primary);
  transition: width 0.3s ease;
}

.enlacesNavegacion a:hover,
.enlacesNavegacion a.activo {
  color: var(--primary);
}

.enlacesNavegacion a:hover::after,
.enlacesNavegacion a.activo::after {
  width: 100%;
}

.botonMenu {
  display: none;
  flex-direction: column;
  gap: 5px;
  cursor: pointer;
}

.botonMenu span {
  width: 25px;
  height: 3px;
  background: var(--text);
  border-radius: 2px;
}

/* Page Header */
.encabezadoPagina {
  padding: 150px 8% 80px;
  text-align: center;
  background: linear-gradient(135deg, rgba(122, 0, 255, 0.1), transparent);
}

.encabezadoPagina h1 {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 800;
  background: linear-gradient(135deg, var(--text), var(--primary-light));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 20px;
}

.encabezadoPagina p {
  font-size: 1.3rem;
  color: var(--text-gray);
  max-width: 700px;
  margin: 0 auto;
}

/* Contact Section */
.seccionContacto {
  padding: 80px 8%;
  max-width: 1400px;
  margin: 0 auto;
}

.contenidoContacto {
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: 50px;
}

/* Form */
.contenidoFormulario {
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(122, 0, 255, 0.2);
  border-radius: 20px;
  padding: 50px;
  transition: all 0.4s ease;
}

.contenidoFormulario:hover {
  border-color: var(--primary);
  box-shadow: 0 20px 40px rgba(122, 0, 255, 0.2);
}

.formularioContacto {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.grupoFormulario {
  position: relative;
}

.grupoFormulario label {
  display: block;
  margin-bottom: 10px;
  color: var(--text-gray);
  font-weight: 500;
}

.grupoFormulario input,
.grupoFormulario textarea {
  width: 100%;
  padding: 16px 20px;
  background: rgba(0, 0, 0, 0.5);
  border: 2px solid rgba(122, 0, 255, 0.2);
  border-radius: 12px;
  color: var(--text);
  font-family: inherit;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.grupoFormulario input:focus,
.grupoFormulario textarea:focus {
  outline: none;
  border-color: var(--primary);
  background: rgba(0, 0, 0, 0.7);
  box-shadow: 0 0 20px rgba(122, 0, 255, 0.2);
}

.grupoFormulario textarea {
  min-height: 150px;
  resize: vertical;
}

.botonEnviar {
  padding: 18px 40px;
  background: linear-gradient(135deg, var(--primary), var(--primary-dark));
  color: var(--text);
  border: none;
  border-radius: 50px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 10px 30px rgba(122, 0, 255, 0.4);
}

.botonEnviar:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 40px rgba(122, 0, 255, 0.6);
}

.botonEnviar:disabled {
  opacity: 0.6;
  cursor: not-allowed;
  transform: none;
}

/* Contact Info */
.infoContacto {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.infoCarta {
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(122, 0, 255, 0.2);
  border-radius: 20px;
  padding: 35px;
  transition: all 0.4s ease;
}

.infoCarta:hover {
  transform: translateY(-5px);
  border-color: var(--primary);
  box-shadow: 0 20px 40px rgba(122, 0, 255, 0.3);
}

.infoCarta h3 {
  color: var(--primary-light);
  font-size: 1.5rem;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.infoItem {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 15px;
  padding: 12px;
  border-radius: 10px;
  transition: all 0.3s ease;
}

.infoItem:hover {
  background: rgba(122, 0, 255, 0.1);
  transform: translateX(5px);
}

.infoItem span {
  font-size: 1.5rem;
}

.infoItem p,
.infoItem a {
  color: var(--text-gray);
  text-decoration: none;
  transition: color 0.3s ease;
}

.infoItem a:hover {
  color: var(--primary);
}

/* Social Links */
.redesSociales {
  display: flex;
  gap: 15px;
  justify-content: center;
  margin-top: 20px;
}

.redesSociales a {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 2px solid var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  transition: all 0.3s ease;
}

.redesSociales a:hover {
  background: var(--primary);
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(122, 0, 255, 0.5);
}

/* Alert */
.alert {
  position: fixed;
  top: 100px;
  right: 30px;
  background: rgba(26, 26, 26, 0.98);
  backdrop-filter: blur(20px);
  padding: 20px 30px;
  border-radius: 16px;
  border: 1px solid rgba(122, 0, 255, 0.3);
  color: var(--text);
  opacity: 0;
  transform: translateX(400px);
  transition: all 0.5s ease;
  z-index: 2000;
  max-width: 350px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
}

.alert.show {
  opacity: 1;
  transform: translateX(0);
}

.alert.success {
  border-left: 4px solid #00ff88;
}

.alert.error {
  border-left: 4px solid #ff4444;
}

.alert-content {
  display: flex;
  align-items: center;
  gap: 15px;
}

.alert-icon {
  font-size: 1.8rem;
}

/* Footer */
footer {
  background: var(--bg-darker);
  padding: 60px 8% 30px;
  border-top: 1px solid rgba(122, 0, 255, 0.2);
  margin-top: 80px;
}

.contenidoPie {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 40px;
  max-width: 1400px;
  margin: 0 auto 40px;
}

.seccionPie h3 {
  color: var(--primary-light);
  margin-bottom: 20px;
  font-size: 1.3rem;
}

.seccionPie p,
.seccionPie a {
  color: var(--text-gray);
  text-decoration: none;
  display: block;
  margin-bottom: 10px;
  transition: color 0.3s ease;
}

.seccionPie a:hover {
  color: var(--primary);
}

.redesSociales {
  display: flex;
  gap: 15px;
  margin-top: 15px;
}

.redesSociales a {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 2px solid var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.redesSociales a:hover {
  background: var(--primary);
  transform: translateY(-3px);
}

.botonPie {
  text-align: center;
  padding-top: 30px;
  border-top: 1px solid rgba(122, 0, 255, 0.2);
  color: var(--text-gray);
}

/* Responsive */
@media (max-width: 968px) {
  .contenidoContacto {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .botonMenu {
    display: flex;
  }

  .enlacesNavegacion {
    position: fixed;
    top: 70px;
    right: -100%;
    width: 250px;
    height: calc(100vh - 70px);
    background: rgba(0, 0, 0, 0.98);
    flex-direction: column;
    padding: 40px 30px;
    gap: 30px;
    transition: right 0.4s ease;
    border-left: 1px solid rgba(122, 0, 255, 0.2);
  }

  .enlacesNavegacion.activo {
    right: 0;
  }

  .seccionContacto {
    padding: 60px 5%;
  }

  .encabezadoPagina {
    padding: 120px 5% 60px;
  }

  .contenidoFormulario {
    padding: 35px;
  }

  .alert {
    right: 15px;
    left: 15px;
    max-width: none;
  }
}
    </style>
  </head>

  <body>
    <div class="fondoAnimado"></div>

    <header>
      <nav>
        <div class="logo">
          <img src="KJCODELOGO.webp" alt="KJCODE Logo" />
        </div>
        <ul class="enlacesNavegacion" id="enlacesNavegacion">
          <li><a href="index.php">INICIO</a></li>
          <li><a href="nosotros.php">NOSOTROS</a></li>
          <li><a href="servicios.php">SERVICIOS</a></li>
          <li><a href="contacto.php" class="activo">CONTACTO</a></li>
        </ul>
        <div class="botonMenu" id="botonMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>

    <section class="encabezadoPagina">
      <h1>Contáctanos</h1>
      <p>Estamos listos para escuchar tu proyecto y convertirlo en realidad</p>
    </section>

    <section class="seccionContacto">
      <div class="contenidoContacto">
        <div class="contenidoFormulario">
          <form id="formularioContacto" class="formularioContacto" method="POST" action="">
            <div class="grupoFormulario">
              <label for="nombre">Nombre Completo</label>
              <input type="text" id="nombre" name="nombre" required />
            </div>
            <div class="grupoFormulario">
              <label for="email">Correo Electrónico</label>
              <input type="email" id="email" name="email" required />
            </div>
            <div class="grupoFormulario">
              <label for="asunto">Asunto</label>
              <input type="text" id="asunto" name="asunto" required />
            </div>
            <div class="grupoFormulario">
              <label for="mensaje">Mensaje</label>
              <textarea
                id="mensaje"
                name="mensaje"
                required
                placeholder="Cuéntanos sobre tu proyecto..."
              ></textarea>
            </div>
            <button type="submit" class="botonEnviar">Enviar Mensaje</button>
          </form>
        </div>

        <div class="infoContacto">
          <div class="infoCarta">
            <h3>📍 Ubicación</h3>
            <div class="infoItem">
              <span>🏢</span>
              <p>Bogotá, Colombia</p>
            </div>
          </div>

          <div class="infoCarta">
            <h3>📞 Contacto Directo</h3>
            <div class="infoItem">
              <span>📧</span>
              <p><a href="mailto:kjcode6@gmail.com">kjcode6@gmail.com</a></p>
            </div>
            <div class="infoItem">
              <span>📱</span>
              <p>
                <a href="https://wa.me/573188799710" target="_blank"
                  >+57 318 879 9710</a
                >
              </p>
            </div>
            <div class="infoItem">
              <span>📱</span>
              <p>
                <a href="https://wa.me/573003156797" target="_blank"
                  >+57 300 315 6797</a
                >
              </p>
            </div>
          </div>

          <div class="infoCarta">
            <h3>🌐 Redes Sociales</h3>
            <div class="redesSociales">
              <a
                href="https://www.instagram.com/kjco.de"
                target="_blank"
                title="Instagram"
                >📷</a
              >
              <a
                href="https://www.facebook.com/profile.php?id=61580866250656"
                target="_blank"
                title="Facebook"
                >📘</a
              >
              <a
                href="https://www.tiktok.com/@kjco.de"
                target="_blank"
                title="TikTok"
                >🎵</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="contenidoPie">
        <div class="seccionPie">
          <h3>KJCODE</h3>
          <p><strong>Colombia</strong></p>
          <p>Bogotá, Colombia</p>
          <p>Tel: +57 318 879 9710</p>
          <p>Tel: +57 300 315 6797</p>
          <p>kjcode6@gmail.com</p>
        </div>
        <div class="seccionPie">
          <h3>Servicios</h3>
          <a href="servicios.php">Desarrollo Web</a>
          <a href="servicios.php">Aplicaciones a Medida</a>
          <a href="servicios.php">Sistemas Empresariales</a>
          <a href="servicios.php">Mantenimiento Web</a>
        </div>
        <div class="seccionPie">
          <h3>Empresa</h3>
          <a href="nosotros.php">Sobre Nosotros</a>
          <a href="nosotros.php">Misión y Visión</a>
          <a href="nosotros.php">Nuestro Equipo</a>
          <a href="contacto.php">Contacto</a>
        </div>
        <div class="seccionPie">
          <h3>Síguenos</h3>
          <div class="redesSociales">
            <a href="https://www.instagram.com/kjco.de" target="_blank">📷</a>
            <a
              href="https://www.facebook.com/profile.php?id=61580866250656"
              target="_blank"
              >📘</a
            >
            <a href="https://www.tiktok.com/@kjco.de" target="_blank">🎵</a>
          </div>
        </div>
      </div>
      <div class="botonPie">
        <p>&copy; 2025 KJCODE - Todos los derechos reservados</p>
      </div>
    </footer>

    <script>
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
    </script>
  </body>
</html>