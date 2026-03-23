<?php
// Página Nosotros - KJCODE
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KJCODE - Sobre Nosotros</title>
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

      /* Content Sections */
      .contenidoSeccion {
        padding: 80px 8%;
        max-width: 1400px;
        margin: 0 auto;
      }

      .contenidoNosotros {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        margin-bottom: 100px;
      }

      .textoNosotros h2 {
        font-size: 2.5rem;
        margin-bottom: 25px;
        color: var(--primary-light);
      }

      .textoNosotros p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-gray);
        margin-bottom: 20px;
      }

      .resaltar {
        color: var(--primary-light);
        font-weight: 600;
      }

      .iconoNosotros {
        width: 100%;
        height: 400px;
        background: linear-gradient(
          135deg,
          rgba(122, 0, 255, 0.2),
          rgba(122, 0, 255, 0.05)
        );
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 6rem;
        border: 1px solid rgba(122, 0, 255, 0.3);
      }

      /* Mission Vision Values */
      .contenidoMVV {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 100px;
      }

      .cartaMVV {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(122, 0, 255, 0.2);
        border-radius: 20px;
        padding: 40px;
        transition: all 0.4s ease;
      }

      .cartaMVV:hover {
        transform: translateY(-10px);
        border-color: var(--primary);
        box-shadow: 0 20px 40px rgba(122, 0, 255, 0.3);
      }

      .cartaMVV h3 {
        font-size: 2rem;
        color: var(--primary-light);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
      }

      .cartaMVV p {
        color: var(--text-gray);
        line-height: 1.8;
        font-size: 1.1rem;
      }

      /* Values Grid */
      .seccionValores {
        margin-top: 0;
      }

      .valoresGrilla {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 40px;
      }

      .valor {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(122, 0, 255, 0.2);
        border-left: 4px solid var(--primary);
        border-radius: 12px;
        padding: 25px;
        transition: all 0.3s ease;
      }

      .valor:hover {
        transform: translateX(10px);
        background: rgba(122, 0, 255, 0.05);
      }

      .valor h4 {
        color: var(--primary-light);
        font-size: 1.3rem;
        margin-bottom: 10px;
      }

      .valor p {
        color: var(--text-gray);
        line-height: 1.6;
      }

      /* Team Section */
      .seccionEquipo {
        text-align: center;
      }

      .seccionTitulo {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        margin-bottom: 60px;
        background: linear-gradient(135deg, var(--text), var(--primary-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      .equipoGrilla {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 40px;
        max-width: 900px;
        margin: 0 auto;
      }

      .equipoMiembro {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(122, 0, 255, 0.2);
        border-radius: 20px;
        padding: 40px;
        transition: all 0.4s ease;
        text-align: center;
      }

      .equipoMiembro:hover {
        transform: translateY(-10px);
        border-color: var(--primary);
        box-shadow: 0 20px 40px rgba(122, 0, 255, 0.3);
      }

      .iconoMiembro {
        width: 120px;
        height: 120px;
        margin: 0 auto 25px;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
      }

      .equipoMiembro h3 {
        font-size: 1.8rem;
        color: var(--primary-light);
        margin-bottom: 10px;
      }

      .equipoMiembro .rol {
        color: var(--text-gray);
        font-size: 1rem;
        margin-bottom: 20px;
        font-weight: 500;
      }

      .equipoMiembro p {
        color: var(--text-gray);
        line-height: 1.7;
        margin-bottom: 25px;
      }

      .botonContacto {
        display: inline-block;
        padding: 12px 30px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--text);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .botonContacto:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(122, 0, 255, 0.5);
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

      .social-links a {
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
        .contenidoNosotros {
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

        .contenidoSeccion {
          padding: 60px 5%;
        }

        .encabezadoPagina {
          padding: 120px 5% 60px;
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
          <li><a href="nosotros.php" class="activo">NOSOTROS</a></li>
          <li><a href="servicios.php">SERVICIOS</a></li>
          <li><a href="contacto.php">CONTACTO</a></li>
        </ul>
        <div
          class="botonMenu"
          id="botonMenu"
          aria-label="Menú"
          aria-expanded="false"
        >
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>

    <section class="encabezadoPagina">
      <h1>Sobre Nosotros</h1>
      <p>
        Conoce quiénes somos y qué nos impulsa a crear soluciones tecnológicas
        innovadoras
      </p>
    </section>

    <section class="contenidoSeccion">
      <div class="contenidoNosotros">
        <div class="textoNosotros">
          <h2>🚀 Nuestra Historia</h2>
          <p>
            <strong>KJCODE</strong> es una startup de desarrollo de software
            creada por jóvenes programadores apasionados por la tecnología y la
            innovación.
          </p>
          <p>
            No somos una empresa tradicional: vivimos el código, respiramos
            tecnología y creemos que cada cliente merece una solución
            <span class="resaltar">a su medida</span>.
          </p>
          <p>
            Nuestra meta es clara: transformar ideas en soluciones digitales que
            hagan la diferencia en el mundo empresarial y tecnológico.
          </p>
        </div>
        <div class="iconoNosotros">💻</div>
      </div>

      <div class="contenidoMVV">
        <div class="cartaMVV">
          <h3>🎯 Misión</h3>
          <p>
            Diseñar y desarrollar soluciones de software innovadoras,
            funcionales y personalizadas que impulsen el crecimiento de nuestros
            clientes, utilizando tecnologías de vanguardia y un enfoque centrado
            en sus necesidades.
          </p>
        </div>
        <div class="cartaMVV">
          <h3>👁 Visión</h3>
          <p>
            Ser líderes en desarrollo de software a nivel nacional e
            internacional, reconocidos por nuestra innovación, talento joven y
            capacidad para crear experiencias digitales que transformen negocios
            y vidas.
          </p>
        </div>
      </div>

      <div class="seccionValores">
        <h2 class="seccionTitulo">💎 Nuestros Valores</h2>
        <div class="valoresGrilla">
          <div class="valor">
            <h4>Innovación</h4>
            <p>
              Aplicamos soluciones creativas y tecnologías modernas en cada
              proyecto
            </p>
          </div>
          <div class="valor">
            <h4>Responsabilidad</h4>
            <p>Cumplimos con nuestros compromisos y plazos establecidos</p>
          </div>
          <div class="valor">
            <h4>Trabajo en Equipo</h4>
            <p>Colaboramos para lograr los mejores resultados</p>
          </div>
          <div class="valor">
            <h4>Compromiso con el Cliente</h4>
            <p>Entendemos y priorizamos las necesidades de nuestros clientes</p>
          </div>
          <div class="valor">
            <h4>Honestidad</h4>
            <p>Transparencia y claridad en cada etapa del proceso</p>
          </div>
          <div class="valor">
            <h4>Constancia</h4>
            <p>Esfuerzo diario y perseverancia para alcanzar la excelencia</p>
          </div>
        </div>
      </div>
    </section>

    <section class="contenidoSeccion seccionEquipo">
      <h2 class="seccionTitulo">💻 Nuestro Equipo</h2>
      <p style="color: var(--text-gray); font-size: 1.2rem; margin-bottom: 50px">
        Somos dos jóvenes apasionados por la tecnología, comprometidos con crear
        soluciones digitales que marquen la diferencia
      </p>
      <div class="equipoGrilla">
        <div class="equipoMiembro">
          <div class="iconoMiembro">👨‍💻</div>
          <h3>Kevin Rodríguez</h3>
          <p class="rol">Co-fundador &amp; Desarrollador</p>
          <p>
            Apasionado por transformar ideas en soluciones digitales modernas,
            funcionales y escalables que impulsen el crecimiento de los negocios.
          </p>
          <a
            href="https://wa.me/573188799710"
            target="_blank"
            class="botonContacto"
            >📲 Contactar</a
          >
        </div>
        <div class="equipoMiembro">
          <div class="iconoMiembro">👨‍💻</div>
          <h3>Joan Pérez</h3>
          <p class="rol">Co-fundador &amp; Desarrollador</p>
          <p>
            Su visión innovadora y pensamiento estratégico impulsan a KJCODE a
            crear experiencias digitales únicas y memorables.
          </p>
          <a
            href="https://wa.me/573003156797"
            target="_blank"
            class="botonContacto"
            >📲 Contactar</a
          >
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
        <p>&copy; <?php echo date('Y'); ?> KJCODE - Todos los derechos reservados</p>
      </div>
    </footer>

    <script>
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
        const elementosAnimar = document.querySelectorAll(
          ".contenidoNosotros, .cartaMVV, .valor, .equipoMiembro"
        );

        elementosAnimar.forEach((elemento) => {
          elemento.style.opacity = "0";
          elemento.style.transform = "translateY(40px)";
          elemento.style.transition = "all 0.8s ease";
        });

        const opciones = {
          threshold: 0.15,
          rootMargin: "0px 0px -50px 0px",
        };

        const observer = new IntersectionObserver((entradas) => {
          entradas.forEach((entrada, index) => {
            if (entrada.isIntersecting) {
              setTimeout(() => {
                entrada.target.style.opacity = "1";
                entrada.target.style.transform = "translateY(0)";
              }, index * 100);

              observer.unobserve(entrada.target);
            }
          });
        }, opciones);

        elementosAnimar.forEach((elemento) => {
          observer.observe(elemento);
        });
      }

      // ============================================
      // 3. EFECTOS HOVER MEJORADOS CON JS
      // ============================================

      function mejorarEfectosHover() {
        const tarjetas = document.querySelectorAll(".cartaMVV, .equipoMiembro");

        tarjetas.forEach((tarjeta) => {
          tarjeta.addEventListener("mouseenter", function () {
            this.style.transition =
              "all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)";
            this.style.transform = "translateY(-12px) scale(1.02)";
          });

          tarjeta.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0) scale(1)";
          });

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

          tarjeta.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0) scale(1) rotateX(0) rotateY(0)";
          });
        });

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
        const boton = document.createElement("button");
        boton.innerHTML = "↑";
        boton.className = "botonScrollTop";

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
    </script>
  </body>
</html>