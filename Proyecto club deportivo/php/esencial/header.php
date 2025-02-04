<?php
if (isset($_GET["error"])) {
    $error = $_GET['error'];
}else{
    $error = 0;
}
?>

<header class="text-white">
  <nav class="navbar navbar-expand-lg navbar-dark container">
    <a class="navbar-brand" href="../../index.php">
      <img loading='lazy' class="logo" src="../../imagenes/Logo.png" alt="Logo Atarfe Fighting">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">

    </div>


    <?php

    session_start();
    require_once "utilidades.php";
    $pagina_actual = basename($_SERVER['PHP_SELF']);
    $privilegios = true;
    echo "<div>";
    if (!isset($_SESSION["nombre"]) && $pagina_actual == "index.php") {
      echo "</div>";
      $privilegios = false;
    } else if (isset($_SESSION["nombre"]) && $pagina_actual == "servicios.php" && $_SESSION["tipo"] == "normal") {
      echo "<h2>Tienes que ser admin para estar aquí</h2>
              </div>";
      $privilegios = false;
    } else if (!isset($_SESSION["nombre"]) && $pagina_actual == "registro.php") {
      echo "</div>";
      $privilegios = true;
    } else {
      echo "</div>";
    }

    if (isset($_SESSION["nombre"])) {
      echo formulario_sesion_iniciada($_SESSION["nombre"]);
    } else {
      echo formulario_para_iniciar_sesion($pagina_actual, $error);
    }

    ?>
    </div>
  </nav>
</header>
<nav id="enlaces">
  <ul>
    <li>
      <a href="../../index.php">
        <button class="btn text-light" type="button">Inicio</button>
      </a>
    </li>
    <li>
      <a href="../noticia/noticias.php">
        <button class="btn text-light" type="button">Noticias</button>
      </a>
    </li>
    <li>
      <a href="../cita/clases.php">
        <button class="btn text-light" type="button">Citas</button>
      </a>
    </li>
    <li>
      <a href="../tienda/tienda.php">
        <button class="btn text-light" type="button">Tienda</button>
      </a>
    </li>
    <li>
      <a href="../servicio/servicios.php">
        <button class="btn text-light" type="button">Servicios</button>
      </a>
    </li>
    <li>
      <a href="../entrenadores/entrenadores.php">
        <button class="btn text-light" type="button">Entrenadores</button>
      </a>
    </li>
    <li>
      <a href="../dietas/dietas.php">
        <button class="btn text-light" type="button">Dietas</button>
      </a>
    </li>
    <li>
      <a href="../socios/socios.php">
        <button class="btn text-light" type="button">Socios</button>
      </a>
    </li>
    <li>
      <a href="../testimonios/testimonios.php">
        <button class="btn text-light" type="button">Testimonios</button>
      </a>
    </li>
    <li>
      <a href="../contacto/contacto.php">
        <button class="btn text-light" type="button">Contactos</button>
      </a>
    </li>
  </ul>
</nav>

<?php
if (isset($_GET["error"])) {
  $error = $_GET['error'];
} else {
  $error = 0;
}
?>
</header>
