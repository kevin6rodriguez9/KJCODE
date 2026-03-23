<?php
// Archivo principal KJCODE
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KJCODE - Transformamos Ideas en Código</title>
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
        --accent: #00ffd1;
      }

      body {
        font-family: "Poppins", sans-serif;
        background: var(--bg-dark);
        color: var(--text);
        overflow-x: hidden;
      }

      /* Fondo animado */
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
        animation: gridMove 20s linear infinite;
      }

      @keyframes gridMove {
        0% {
          transform: translate(0, 0);
        }

        100% {
          transform: translate(50px, 50px);
        }
      }

      .fondoDegradado {
        position: fixed;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(
          circle,
          rgba(122, 0, 255, 0.15) 0%,
          transparent 70%
        );
        z-index: -1;
        animation: float 15s ease-in-out infinite;
      }

      @keyframes float {
        0%,
        100% {
          transform: translate(0, 0) scale(1);
        }

        50% {
          transform: translate(-100px, -100px) scale(1.1);
        }
      }

      /* Cabecera */
      header {
        position: fixed;
        top: 0;
        width: 100%;
        padding: 20px 8%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(122, 0, 255, 0.2);
        z-index: 1000;
        transition: all 0.3s ease;
      }

      header.scrolled {
        padding: 15px 8%;
        background: rgba(0, 0, 0, 0.95);
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
        transition: all 0.3s ease;
      }

      /* Encabezado */
      .encabezadoPrincipal {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 120px 8% 80px;
        position: relative;
      }

      .contenidoEncabezado {
        max-width: 900px;
        animation: fadeInUp 1s ease-out;
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(50px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .encabezadoPrincipal h1 {
        font-size: clamp(2.5rem, 6vw, 5rem);
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 30px;
        background: linear-gradient(
          135deg,
          var(--text) 0%,
          var(--primary-light) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      .encabezadoPrincipal .eslogan {
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        color: var(--text-gray);
        margin-bottom: 50px;
        font-weight: 300;
      }

      .botonesPrincipal {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
      }

      .boton {
        padding: 16px 40px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        display: inline-block;
      }

      .botonPrincipal {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--text);
        box-shadow: 0 10px 30px rgba(122, 0, 255, 0.4);
      }

      .botonPrincipal:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(122, 0, 255, 0.6);
      }

      .botonSecundario {
        background: transparent;
        color: var(--text);
        border: 2px solid var(--primary);
      }

      .botonSecundario:hover {
        background: var(--primary);
        transform: translateY(-3px);
      }

      /* SERVICIOS */
      .serviciosDestacados {
        padding: 100px 8%;
        background: linear-gradient(
          180deg,
          transparent 0%,
          rgba(122, 0, 255, 0.05) 100%
        );
      }

      .tituloSeccion {
        text-align: center;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        margin-bottom: 60px;
        background: linear-gradient(
          135deg,
          var(--text) 0%,
          var(--primary-light) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      .serviciosGrilla {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        max-width: 1400px;
        margin: 0 auto;
      }

      .servicioCarta {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(122, 0, 255, 0.2);
        border-radius: 20px;
        padding: 40px 30px;
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
        box-shadow: 0 20px 40px rgba(122, 0, 255, 0.3);
      }

      .servicioCarta:hover::before {
        opacity: 1;
      }

      .servicioIcono {
        font-size: 3.5rem;
        margin-bottom: 20px;
        display: block;
      }

      .servicioCarta h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: var(--primary-light);
        position: relative;
        z-index: 1;
      }

      .servicioCarta p {
        color: var(--text-gray);
        line-height: 1.6;
        position: relative;
        z-index: 1;
      }

      /* PROYECTOS */
      .proyectos {
        padding: 100px 8%;
      }

      .proyectosGrilla {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
      }

      .proyectoCarta {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(122, 0, 255, 0.2);
        border-radius: 20px;
        padding: 35px;
        transition: all 0.4s ease;
      }

      .proyectoCarta:hover {
        transform: translateY(-10px);
        border-color: var(--primary);
        box-shadow: 0 20px 40px rgba(122, 0, 255, 0.3);
      }

      .proyectoCarta h3 {
        font-size: 1.4rem;
        margin-bottom: 15px;
        color: var(--primary-light);
      }

      .proyectoCarta p {
        color: var(--text-gray);
        line-height: 1.6;
      }

      /* Sección acción */
      .seccionAccion {
        padding: 100px 8%;
        text-align: center;
        background: linear-gradient(135deg, rgba(122, 0, 255, 0.1), transparent);
      }

      .seccionAccion h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        margin-bottom: 30px;
      }

      .seccionAccion p {
        font-size: 1.2rem;
        color: var(--text-gray);
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
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

      .contenidoPie h3 {
        color: var(--primary-light);
        margin-bottom: 20px;
        font-size: 1.3rem;
      }

      .contenidoPie p,
      .contenidoPie a {
        color: var(--text-gray);
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        transition: color 0.3s ease;
      }

      .contenidoPie a:hover {
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

        .encabezadoPrincipal {
          padding: 100px 5% 60px;
        }

        .serviciosDestacados,
        .proyectos,
        .seccionAccion {
          padding: 60px 5%;
        }

        footer {
          padding: 40px 5% 20px;
        }
      }
    </style>
  </head>

  <body>
    <div class="fondoAnimado"></div>
    <div class="logo">
      <img src="KJCODELOGO.webp" alt="KJCODE Logo" />
    </div>
    <div class="fondoDegradado"></div>

    <header id="cabecera">
      <nav>
        <div class="logo">
          <img src="KJCODELOGO.webp" alt="KJCODE Logo" />
        </div>
        <ul class="enlacesNavegacion" id="enlacesNavegacion">
          <li><a href="index.php" class="activo">INICIO</a></li>
          <li><a href="nosotros.php">NOSOTROS</a></li>
          <li><a href="servicios.php">SERVICIOS</a></li>
          <li><a href="contacto.php">CONTACTO</a></li>
        </ul>
        <div class="botonMenu" id="botonMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>

    <section class="encabezadoPrincipal">
      <div class="contenidoEncabezado">
        <h1>Transformamos Ideas en Código</h1>
        <p class="eslogan">
          Innovación y tecnología de vanguardia para impulsar tu negocio al
          futuro digital
        </p>
        <div class="botonesPrincipal">
          <a href="servicios.php" class="boton botonPrincipal">Ver Servicios</a>
          <a href="contacto.php" class="boton botonSecundario">Contáctanos</a>
        </div>
      </div>
    </section>

    <section class="serviciosDestacados" id="servicios">
      <h2 class="tituloSeccion">¿Por Qué Elegirnos?</h2>
      <div class="serviciosGrilla">
        <div class="servicioCarta">
          <span class="servicioIcono">🚀</span>
          <h3>Innovación</h3>
          <p>
            Utilizamos las últimas tecnologías y metodologías para crear
            soluciones que marcan la diferencia
          </p>
        </div>
        <div class="servicioCarta">
          <span class="servicioIcono">🔒</span>
          <h3>Seguridad</h3>
          <p>
            Protegemos tu información con los más altos estándares de seguridad
            y cifrado
          </p>
        </div>
        <div class="servicioCarta">
          <span class="servicioIcono">⚡</span>
          <h3>Eficiencia</h3>
          <p>
            Optimizamos cada línea de código para máxima velocidad y rendimiento
          </p>
        </div>
        <div class="servicioCarta">
          <span class="servicioIcono">🌍</span>
          <h3>Escalabilidad</h3>
          <p>
            Desarrollamos sistemas que crecen junto con tu negocio sin límites
          </p>
        </div>
      </div>
    </section>

    <section class="proyectos">
      <h2 class="tituloSeccion">Proyectos Destacados</h2>
      <div class="proyectosGrilla">
        <div class="proyectoCarta">
          <h3>Sistema de Inventario</h3>
          <p>
            Plataforma web completa con control de inventario en tiempo real
            para empresa metalmecánica
          </p>
        </div>
        <div class="proyectoCarta">
          <h3>Baloncesto &amp; Deportes</h3>
          <p>
            Portal de noticias deportivas con cobertura de baloncesto, Fórmula
            1, motociclismo y fútbol
          </p>
        </div>
        <div class="proyectoCarta">
          <h3>Cultura &amp; Entretenimiento</h3>
          <p>
            Plataformas de información sobre Dragon Ball, videojuegos y
            tendencias actuales
          </p>
        </div>
        <div class="proyectoCarta">
          <h3>Mokepon</h3>
          <p>
            Videojuego web interactivo con personajes únicos y batallas en
            tiempo real
          </p>
        </div>
      </div>
    </section>

    <section class="seccionAccion">
      <h2>¿Listo para Innovar?</h2>
      <p>
        Trabajemos juntos para convertir tu visión en realidad con tecnología de
        última generación
      </p>
      <a href="contacto.php" class="boton botonPrincipal">Comenzar Ahora</a>
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
          rect.top <= windowHeight * 0.85 &&
          rect.bottom >= 0
        );
      }

      // Función para animar elementos cuando aparecen
      function animarAlScroll() {
        const servicioCartas = document.querySelectorAll(".servicioCarta");
        const proyectoCartas = document.querySelectorAll(".proyectoCarta");
        const todasLasCartas = [...servicioCartas, ...proyectoCartas];

        todasLasCartas.forEach((carta, index) => {
          if (estaVisible(carta) && !carta.classList.contains("visible")) {
            setTimeout(() => {
              carta.classList.add("visible");
              carta.style.opacity = "1";
              carta.style.transform = "translateY(0)";
            }, index * 100);
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

      const botones = document.querySelectorAll(".boton");

      botones.forEach((boton) => {
        boton.addEventListener("mouseenter", function () {
          this.style.transform = "translateY(-3px)";
          this.style.transition = "all 0.3s ease";
        });

        boton.addEventListener("mouseleave", function () {
          this.style.transform = "translateY(0)";
        });

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
    </script>
  </body>
</html>