document.addEventListener("DOMContentLoaded", () => {
  /* ---------- SCROLL SUAVE EN ENLACES INTERNOS ---------- */
  const sidebarLinks = document.querySelectorAll(
    "header nav a, #sidebar ul li a"
  );
  sidebarLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      const href = link.getAttribute("href");
      if (href && href.startsWith("#")) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });

  /* ---------- BOTÓN SUBIR ARRIBA ---------- */
  const btnArriba = document.createElement("button");
  btnArriba.id = "btn-arriba";
  btnArriba.innerText = "↑";
  document.body.appendChild(btnArriba);
  btnArriba.style.cssText = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #6c63ff;
    color: white;
    border: none;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    font-size: 20px;
    cursor: pointer;
    display: none;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    z-index: 1000;
    transition: transform 0.2s ease;
  `;
  btnArriba.addEventListener(
    "mouseover",
    () => (btnArriba.style.transform = "scale(1.2)")
  );
  btnArriba.addEventListener(
    "mouseout",
    () => (btnArriba.style.transform = "scale(1)")
  );
  btnArriba.addEventListener("click", () =>
    window.scrollTo({ top: 0, behavior: "smooth" })
  );
  window.addEventListener("scroll", () => {
    btnArriba.style.display = window.scrollY > 200 ? "block" : "none";
  });

  /* ---------- APARECER CON SCROLL (IntersectionObserver) ---------- */
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) entry.target.classList.add("visible");
      });
    },
    { threshold: 0.2 }
  );

  document
    .querySelectorAll(
      "#bienvenida, #porqueElegirnos, #proyectos, #contactar, .card, .item"
    )
    .forEach((el) => {
      el.classList.add("hidden");
      observer.observe(el);
    });

  /* ---------- MENÚ HAMBURGUESA Y SIDEBAR (SOLO ≤677PX) ---------- */
  const initHamburgerMenu = () => {
    const menuHamburguesa = document.getElementById("menuHamburguesa");
    const sidebar = document.getElementById("sidebar");
    const closeBtn = document.getElementById("close-btn");
    if (!menuHamburguesa || !sidebar || !closeBtn) return;

    if (window.innerWidth > 677) {
      menuHamburguesa.style.display = "none";
      sidebar.classList.remove("active");
      closeBtn.style.display = "none";
      document.body.style.overflow = "";
      return;
    }

    menuHamburguesa.style.display = "block";
    closeBtn.style.display = "none";

    const openSidebar = () => {
      sidebar.classList.add("active");
      menuHamburguesa.style.display = "none";
      closeBtn.style.display = "block";
      document.body.style.overflow = "hidden";
    };

    const closeSidebar = () => {
      sidebar.classList.remove("active");
      menuHamburguesa.style.display = "block";
      closeBtn.style.display = "none";
      document.body.style.overflow = "";
    };

    menuHamburguesa.onclick = openSidebar;
    closeBtn.onclick = closeSidebar;

    // Cerrar sidebar al tocar fuera
    document.addEventListener("click", (e) => {
      if (
        sidebar.classList.contains("active") &&
        !sidebar.contains(e.target) &&
        e.target !== menuHamburguesa
      ) {
        closeSidebar();
      }
    });

    // Cerrar al hacer clic en cualquier enlace del sidebar
    sidebar.querySelectorAll("ul li a").forEach((link) => {
      link.addEventListener("click", closeSidebar);
    });

    // Cerrar si se redimensiona a desktop
    window.addEventListener("resize", () => {
      if (window.innerWidth > 677 && sidebar.classList.contains("active")) {
        closeSidebar();
      }
    });
  };
  initHamburgerMenu();
  window.addEventListener("resize", initHamburgerMenu);

  /* ---------- EFECTO ESCRITURA EN #ESLOGAN ---------- */
  const heroText = document.querySelector("#eslogan h1");
  if (heroText) {
    const texto = heroText.innerText;
    heroText.innerText = "";
    let i = 0;
    const escribir = () => {
      if (i < texto.length) {
        heroText.innerHTML += texto[i] === " " ? "&nbsp;" : texto[i];
        i++;
        setTimeout(escribir, 80);
      }
    };
    escribir();
  }

  /* ---------- EFECTO 3D EN TARJETAS ---------- */
  document.querySelectorAll(".card").forEach((card) => {
    card.style.transition = "transform 0.3s ease, box-shadow 0.3s ease";
    card.addEventListener("mousemove", (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const rotateY = (x / rect.width - 0.5) * 10;
      const rotateX = (y / rect.height - 0.5) * -10;
      card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
      card.style.boxShadow = "0 10px 20px rgba(0,0,0,0.3)";
    });
    card.addEventListener("mouseleave", () => {
      card.style.transform = "rotateX(0) rotateY(0) scale(1)";
      card.style.boxShadow = "0 4px 8px rgba(0,0,0,0.2)";
    });
  });

  /* ---------- AÑO AUTOMÁTICO EN EL FOOTER ---------- */
  const footerYear = document.querySelector("footer .pieDePagina-abajo p");
  if (footerYear) {
    footerYear.innerHTML = `&copy; ${new Date().getFullYear()} KJCODE - Todos los derechos reservados`;
  }
});
