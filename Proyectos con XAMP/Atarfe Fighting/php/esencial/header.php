<body style="background:#f4f4f9">
  <?php
  if (isset($_GET["error"])) {
    $error = $_GET['error'];
  } else {
    $error = 0;
  }
  ?>

  <header class="text-white">
    <nav class="navbar navbar-expand-lg navbar-dark container">
      <a class="navbar-brand" href="#">
        <img loading='lazy' class="logo" src="../../imagenes/Logo.png" alt="Logo Atarfe Fighting">
      </a>
      <div id="menu">

      </div>


      <?php
      if (isset($_GET["error"])) {
        $error = $_GET['error'];
      } else {
        $error = 0;
      }
      ?>
      <div class="header-content">
        <?php

        session_start();
        require_once "utilidades.php";
        $pagina_actual = basename($_SERVER['PHP_SELF']);




        ?>
      </div>
      </div>
    </nav>



    <?php

    if (isset($_SESSION["nombre"])) {
      echo formulario_sesion_iniciada($_SESSION["nombre"]);
    } else {
      echo formulario_para_iniciar_sesion($pagina_actual, $error);
    }



    if (isset($_GET["error"])) {
      $error = $_GET['error'];
    } else {
      $error = 0;
    }
    ?>
    <br>

  </header>

  <nav id="enlaces" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" style="justify:center" data-bs-toggle="collapse" data-bs-target="#menuNav" aria-controls="menuNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="php/noticia/noticias.php" class="nav-link">Noticias</a>
          </li>
          <?php if (isset($_SESSION["nombre"])) { ?>
            <li class="nav-item">
              <a href="php/cita/clases.php" class="nav-link">Citas</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a href="php/tienda/tienda.php" class="nav-link">Tienda</a>
          </li>
          <li class="nav-item">
            <a href="php/servicio/servicios.php" class="nav-link">Servicios</a>
          </li>
          <li class="nav-item">
            <a href="php/entrenadores/entrenadores.php" class="nav-link">Entrenadores</a>
          </li>
          <li class="nav-item">
            <a href="php/recetas/recetas.php" class="nav-link">Recetas</a>
          </li>
          <?php if (isset($_SESSION["nombre"])) { ?>
            <li class="nav-item">
              <a href="php/socios/socios.php" class="nav-link">Socios</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a href="php/testimonios/testimonios.php" class="nav-link">Testimonios</a>
          </li>
          <li class="nav-item">
            <a href="php/contacto/contacto.php" class="nav-link">Contactos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS (asegúrate de incluirlo en tu proyecto) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>