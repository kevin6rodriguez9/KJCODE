<?php
// Página Servicios - KJCODE
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KJCODE - Servicios</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Services Section */
    .seccionServicios {
      padding: 80px 8%;
      max-width: 1400px;
      margin: 0 auto;
    }

    .serviciosGrilla {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 35px;
    }

    .servicioCarta {
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(122, 0, 255, 0.2);
      border-radius: 20px;
      padding: 45px 35px;
      text-align: center;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .servicioCarta::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(122, 0, 255, 0.1), transparent);
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .servicioCarta:hover {
      transform: translateY(-10px);
      border-color: var(--primary);
      box-shadow: 0 25px 50px rgba(122, 0, 255, 0.4);
    }

    .servicioCarta:hover::before {
      opacity: 1;
    }

    .iconoServicio {
      font-size: 4rem;
      margin-bottom: 25px;
      display: block;
      position: relative;
      z-index: 1;
    }

    .servicioCarta h3 {
      font-size: 1.8rem;
      color: var(--primary-light);
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
    }

    .servicioCarta p {
      color: var(--text-gray);
      line-height: 1.8;
      font-size: 1.1rem;
      position: relative;
      z-index: 1;
    }

    .servicioCaracteristicas {
      margin-top: 20px;
      text-align: left;
      position: relative;
      z-index: 1;
    }

    .servicioCaracteristicas ul {
      list-style: none;
      padding: 0;
    }

    .servicioCaracteristicas li {
      color: var(--text-gray);
      margin-bottom: 10px;
      padding-left: 25px;
      position: relative;
    }

    .servicioCaracteristicas li::before {
      content: "✓";
      position: absolute;
      left: 0;
      color: var(--primary);
      font-weight: bold;
    }

    /* CTA Section */
    .seccionAccion {
      padding: 100px 8%;
      text-align: center;
      background: linear-gradient(135deg, rgba(122, 0, 255, 0.1), transparent);
      margin-top: 50px;
    }

    .seccionAccion h2 {
      font-size: clamp(2rem, 4vw, 3rem);
      margin-bottom: 30px;
      background: linear-gradient(135deg, var(--text), var(--primary-light));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .seccionAccion p {
      font-size: 1.2rem;
      color: var(--text-gray);
      margin-bottom: 40px;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    .botonPrimario {
      display: inline-block;
      padding: 18px 50px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--text);
      text-decoration: none;
      border-radius: 50px;
      font-weight: 700;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      box-shadow: 0 10px 30px rgba(122, 0, 255, 0.4);
    }

    .botonPrimario:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(122, 0, 255, 0.6);
    }

    /* Footer */
    footer {
      background: var(--bg-darker);
      padding: 60px 8% 30px;
      border-top: 1px solid rgba(122, 0, 255, 0.2);
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

      .seccionServicios {
        padding: 60px 5%;
      }

      .encabezadoPagina {
        padding: 120px 5% 60px;
      }

      .seccionAccion {
        padding: 60px 5%;
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
        <li><a href="servicios.php" class="activo">SERVICIOS</a></li>
        <li><a href="contacto.php">CONTACTO</a></li>
      </ul>
      <div class="botonMenu" id="botonMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
  </header>

  <section class="encabezadoPagina">
    <h1>Nuestros Servicios</h1>
    <p>Soluciones digitales completas y personalizadas para llevar tu negocio al siguiente nivel con tecnología de
      vanguardia</p>
  </section>

  <section class="seccionServicios">
    <div class="serviciosGrilla">
      <div class="servicioCarta">
        <span class="iconoServicio">🌐</span>
        <h3>Desarrollo Web</h3>
        <p>Creamos sitios web modernos, rápidos y completamente adaptables a cualquier dispositivo.</p>
        <div class="servicioCaracteristicas">
          <ul>
            <li>Diseño responsive y moderno</li>
            <li>Optimización SEO</li>
            <li>Alto rendimiento</li>
            <li>Seguridad garantizada</li>
          </ul>
        </div>
      </div>

      <div class="servicioCarta">
        <span class="iconoServicio">📱</span>
        <h3>Aplicaciones a Medida</h3>
        <p>Desarrollamos aplicaciones personalizadas que automatizan procesos y mejoran la productividad.</p>
        <div class="servicioCaracteristicas">
          <ul>
            <li>Análisis de necesidades</li>
            <li>Desarrollo personalizado</li>
            <li>Integración con sistemas</li>
            <li>Soporte continuo</li>
          </ul>
        </div>
      </div>

      <div class="servicioCarta">
        <span class="iconoServicio">⚙️</span>
        <h3>Sistemas Empresariales</h3>
        <p>Soluciones completas para gestión de inventarios, citas, ventas y mucho más.</p>
        <div class="servicioCaracteristicas">
          <ul>
            <li>Sistema de inventarios</li>
            <li>Agendamiento de citas</li>
            <li>Gestión de clientes (CRM)</li>
            <li>Reportes en tiempo real</li>
          </ul>
        </div>
      </div>

      <div class="servicioCarta">
        <span class="iconoServicio">🔧</span>
        <h3>Mantenimiento Web</h3>
        <p>Mantenemos tu sitio actualizado, seguro y funcionando a máxima velocidad en todo momento.</p>
        <div class="servicioCaracteristicas">
          <ul>
            <li>Actualizaciones regulares</li>
            <li>Monitoreo 24/7</li>
            <li>Backups automáticos</li>
            <li>Corrección de errores</li>
          </ul>
        </div>
      </div>

      <div class="servicioCarta">
        <span class="iconoServicio">✨</span>
        <h3>Mejoramiento Web</h3>
        <p>Renovamos y modernizamos sitios existentes con nuevo diseño, velocidad y funcionalidades.</p>
        <div class="servicioCaracteristicas">
          <ul>
            <li>Rediseño moderno</li>
            <li>Optimización de velocidad</li>
            <li>Nuevas funcionalidades</li>
            <li>Mejora de experiencia</li>
          </ul>
        </div>
      </div>

      <div class="servicioCarta">
        <span class="iconoServicio">🎨</span>
        <h3>Diseño UI/UX</h3>
        <p>Creamos interfaces atractivas e intuitivas que brindan la mejor experiencia a tus usuarios.</p>
        <div class="servicioCaracteristicas">
          <ul>
            <li>Diseño centrado en el usuario</li>
            <li>Prototipos interactivos</li>
            <li>Identidad visual coherente</li>
            <li>Accesibilidad garantizada</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="seccionAccion">
    <h2>¿Listo para Transformar tu Negocio?</h2>
    <p>Contáctanos hoy y descubre cómo nuestras soluciones pueden llevar tu proyecto al siguiente nivel</p>
    <a href="contacto.php" class="botonPrimario">Comenzar Proyecto</a>
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
          <a href="https://www.facebook.com/profile.php?id=61580866250656" target="_blank">📘</a>
          <a href="https://www.tiktok.com/@kjco.de" target="_blank">🎵</a>
        </div>
      </div>
    </div>
    <div class="botonPie">
      <p>&copy; <?php echo date('Y'); ?> KJCODE - Todos los derechos reservados</p>
    </div>
  </footer>

  <script>
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
          if ("ontouchstart" in window) {
            this.style.transform = "translateY(-12px) scale(1.03)";
            this.style.borderColor = "var(--primary)";
            this.style.boxShadow = "0 25px 50px rgba(122, 0, 255, 0.4)";

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

      cartas.forEach((carta) => {
        carta.style.opacity = "0";
        carta.style.transform = "translateY(40px)";
        carta.style.transition = "all 0.7s ease";
      });

      const opciones = {
        threshold: 0.2,
        rootMargin: "0px 0px -50px 0px",
      };

      const observer = new IntersectionObserver((entradas) => {
        entradas.forEach((entrada, index) => {
          if (entrada.isIntersecting) {
            setTimeout(() => {
              entrada.target.style.opacity = "1";
              entrada.target.style.transform = "translateY(0)";
            }, index * 150);

            observer.unobserve(entrada.target);
          }
        });
      }, opciones);

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

      function activarPulso() {
        boton.classList.add("pulso-activo");
        setTimeout(() => {
          boton.classList.remove("pulso-activo");
        }, 800);
      }

      setInterval(activarPulso, 5000);

      boton.addEventListener("mouseenter", function () {
        this.style.transform = "translateY(-5px) scale(1.05)";
      });

      boton.addEventListener("mouseleave", function () {
        this.style.transform = "translateY(0) scale(1)";
      });

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
      const boton = document.createElement("button");
      boton.innerHTML = "↑";
      boton.setAttribute("aria-label", "Volver arriba");

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
    // 8. INICIALIZACIÓN
    // ============================================

    function inicializar() {
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
  </script>
</body>

</html>