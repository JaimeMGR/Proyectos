
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });


    // Fade-in effect on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    });

    document.querySelectorAll('.fade-in').forEach(section => {
        observer.observe(section);
    });

    function toggleMenu() {
        const menuLateral = document.getElementById("menu-lateral");
        menuLateral.classList.toggle("visible");
    }


$(document).ready(function() {
    $(".more").on("click", function() {
      // cambiar la visibilidad de complete
      $(".complete").toggle();
  
      // cambiar el texto del boton dependiendo del texto actual
      if ($(this).text() == "Leer menos...") {
        $(this).text("Leer mas...");
      } else {
        $(this).text("Leer menos...");
      }
    });
  });