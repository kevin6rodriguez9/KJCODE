<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KJCODE - Nuestros Servicios</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="servicios.css" />
</head>

<body>
  <!-- Fondos Animados -->
  <div class="fondoAnimado"></div>
  <div class="fondoDegradado"></div>
  <div class="particulas">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- Header -->
  <header id="cabecera">
    <nav class="contenedor">
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

  <!-- Hero Section -->
  <section class="heroServicios">
    <div class="contenedor">
      <div class="heroContenido">
        <span class="badge">Soluciones Digitales</span>
        <h1 class="heroTitulo">
          Nuestros<br />
          <span class="gradientText">Servicios</span>
        </h1>
        <p class="heroDescripcion">
          Soluciones digitales completas y personalizadas para llevar tu negocio 
          al siguiente nivel con tecnología de vanguardia
        </p>
      </div>
    </div>
    
    <!-- Indicador de scroll -->
    <div class="scrollIndicador">
      <div class="mouse">
        <div class="rueda"></div>
      </div>
    </div>
  </section>

  <!-- Sección: Servicios Principales -->
  <section class="seccionServicios">
    <div class="contenedor">
      <div class="seccionHeader">
        <span class="subtitulo">Lo Que Hacemos</span>
        <h2 class="tituloSeccion">Servicios Principales</h2>
        <p class="descripcionSeccion">
          Desarrollamos soluciones tecnológicas que impulsan el crecimiento de tu negocio
        </p>
      </div>

      <div class="serviciosGrid">
        <div class="servicioCard" data-aos="fade-up" data-delay="0">
          <div class="servicioIcono">
            <span>🌐</span>
          </div>
          <div class="servicioContenido">
            <h3>Desarrollo Web</h3>
            <p>
              Creamos sitios web modernos, rápidos y completamente adaptables 
              a cualquier dispositivo.
            </p>
            <ul class="servicioLista">
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Diseño responsive y moderno</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Optimización SEO</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Alto rendimiento</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Seguridad garantizada</span>
              </li>
            </ul>
          </div>
          <div class="servicioDecoracion"></div>
        </div>

        <div class="servicioCard" data-aos="fade-up" data-delay="100">
          <div class="servicioIcono">
            <span>📱</span>
          </div>
          <div class="servicioContenido">
            <h3>Aplicaciones a Medida</h3>
            <p>
              Desarrollamos aplicaciones personalizadas que automatizan procesos 
              y mejoran la productividad.
            </p>
            <ul class="servicioLista">
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Análisis de necesidades</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Desarrollo personalizado</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Integración con sistemas</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Soporte continuo</span>
              </li>
            </ul>
          </div>
          <div class="servicioDecoracion"></div>
        </div>

        <div class="servicioCard" data-aos="fade-up" data-delay="200">
          <div class="servicioIcono">
            <span>⚙️</span>
          </div>
          <div class="servicioContenido">
            <h3>Sistemas Empresariales</h3>
            <p>
              Soluciones completas para gestión de inventarios, citas, ventas 
              y mucho más.
            </p>
            <ul class="servicioLista">
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Sistema de inventarios</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Agendamiento de citas</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Gestión de clientes (CRM)</span>
              </li>
              <li>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Reportes en tiempo real</span>
              </li>
            </ul>
          </div>
          <div class="servicioDecoracion"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección: Servicios Adicionales -->
  <section class="seccionServiciosAdicionales">
    <div class="contenedor">
      <div class="seccionHeader">
        <span class="subtitulo">Más Soluciones</span>
        <h2 class="tituloSeccion">Servicios Adicionales</h2>
        <p class="descripcionSeccion">
          Complementamos tu proyecto con servicios especializados de mantenimiento y diseño
        </p>
      </div>

      <div class="serviciosAdicionalesGrid">
        <div class="servicioAdicionalCard" data-aos="zoom-in" data-delay="0">
          <div class="servicioAdicionalIcono">
            <span>🔧</span>
          </div>
          <div class="servicioAdicionalContenido">
            <h3>Mantenimiento Web</h3>
            <p>
              Mantenemos tu sitio actualizado, seguro y funcionando a máxima 
              velocidad en todo momento.
            </p>
            <ul class="servicioAdicionalLista">
              <li>Actualizaciones regulares</li>
              <li>Monitoreo 24/7</li>
              <li>Backups automáticos</li>
              <li>Corrección de errores</li>
            </ul>
          </div>
        </div>

        <div class="servicioAdicionalCard" data-aos="zoom-in" data-delay="100">
          <div class="servicioAdicionalIcono">
            <span>✨</span>
          </div>
          <div class="servicioAdicionalContenido">
            <h3>Mejoramiento Web</h3>
            <p>
              Renovamos y modernizamos sitios existentes con nuevo diseño, 
              velocidad y funcionalidades.
            </p>
            <ul class="servicioAdicionalLista">
              <li>Rediseño moderno</li>
              <li>Optimización de velocidad</li>
              <li>Nuevas funcionalidades</li>
              <li>Mejora de experiencia</li>
            </ul>
          </div>
        </div>

        <div class="servicioAdicionalCard" data-aos="zoom-in" data-delay="200">
          <div class="servicioAdicionalIcono">
            <span>🎨</span>
          </div>
          <div class="servicioAdicionalContenido">
            <h3>Diseño UI/UX</h3>
            <p>
              Creamos interfaces atractivas e intuitivas que brindan la mejor 
              experiencia a tus usuarios.
            </p>
            <ul class="servicioAdicionalLista">
              <li>Diseño centrado en el usuario</li>
              <li>Prototipos interactivos</li>
              <li>Identidad visual coherente</li>
              <li>Accesibilidad garantizada</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección: Proceso de Trabajo -->
  <section class="seccionProceso">
    <div class="contenedor">
      <div class="seccionHeader">
        <span class="subtitulo">Cómo Trabajamos</span>
        <h2 class="tituloSeccion">Nuestro Proceso</h2>
        <p class="descripcionSeccion">
          Un enfoque estructurado para garantizar el éxito de tu proyecto
        </p>
      </div>

      <div class="procesoGrid">
        <div class="pasoCard" data-aos="fade-up" data-delay="0">
          <div class="pasoNumero">01</div>
          <h3>Consulta Inicial</h3>
          <p>Escuchamos tus necesidades y objetivos para entender completamente tu visión</p>
        </div>

        <div class="pasoCard" data-aos="fade-up" data-delay="100">
          <div class="pasoNumero">02</div>
          <h3>Planificación</h3>
          <p>Diseñamos una estrategia personalizada y definimos el alcance del proyecto</p>
        </div>

        <div class="pasoCard" data-aos="fade-up" data-delay="200">
          <div class="pasoNumero">03</div>
          <h3>Desarrollo</h3>
          <p>Construimos tu solución con las mejores prácticas y tecnologías modernas</p>
        </div>

        <div class="pasoCard" data-aos="fade-up" data-delay="300">
          <div class="pasoNumero">04</div>
          <h3>Entrega y Soporte</h3>
          <p>Lanzamos tu proyecto y te brindamos soporte continuo para su éxito</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="ctaSeccion">
    <div class="contenedor">
      <div class="ctaContenido">
        <div class="ctaTexto">
          <h2>¿Listo para Transformar tu Negocio?</h2>
          <p>
            Contáctanos hoy y descubre cómo nuestras soluciones pueden llevar 
            tu proyecto al siguiente nivel
          </p>
        </div>
        <div class="ctaBoton">
          <a href="contacto.php" class="boton botonPrimario botonLarge">
            <span>Comenzar Proyecto</span>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="contenedor">
      <div class="footerContenido">
        <div class="footerColumna footerPrincipal">
          <div class="footerLogo">
            <img src="KJCODELOGO.webp" alt="KJCODE Logo" />
          </div>
          <p class="footerDescripcion">
            Transformamos ideas en soluciones tecnológicas que impulsan el crecimiento empresarial.
          </p>
          <div class="redesSociales">
            <a href="https://www.instagram.com/kjco.de" target="_blank" aria-label="Instagram">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61580866250656" target="_blank" aria-label="Facebook">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
            <a href="https://www.tiktok.com/@kjco.de" target="_blank" aria-label="TikTok">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
              </svg>
            </a>
          </div>
        </div>

        <div class="footerColumna">
          <h3>Servicios</h3>
          <ul>
            <li><a href="servicios.php">Desarrollo Web</a></li>
            <li><a href="servicios.php">Aplicaciones a Medida</a></li>
            <li><a href="servicios.php">Sistemas Empresariales</a></li>
            <li><a href="servicios.php">Mantenimiento Web</a></li>
          </ul>
        </div>

        <div class="footerColumna">
          <h3>Empresa</h3>
          <ul>
            <li><a href="nosotros.php">Sobre Nosotros</a></li>
            <li><a href="nosotros.php">Misión y Visión</a></li>
            <li><a href="nosotros.php">Nuestro Equipo</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div>

        <div class="footerColumna">
          <h3>Contacto</h3>
          <ul class="footerContacto">
            <li>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <span>Bogotá, Colombia</span>
            </li>
            <li>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
              <span>+57 318 879 9710</span>
            </li>
            <li>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
              <span>kjcode6@gmail.com</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="footerBottom">
        <p>&copy; 2025 KJCODE - Todos los derechos reservados</p>
        <div class="footerLinks">
          <a href="#">Política de Privacidad</a>
          <span>•</span>
          <a href="#">Términos de Servicio</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="servicios.js"></script>
</body>

</html>