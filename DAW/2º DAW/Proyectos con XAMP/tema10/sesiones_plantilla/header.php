<?php
if (isset($_GET["error"])) {
    $error = $_GET['error'];
}else{
    $error = 0;
}
?>
<header>
        <div class="header-content">
                <?php

                session_start();
                require_once "utilidades.php";
                $pagina_actual = basename($_SERVER['PHP_SELF']);
                $privilegios = true;
                echo "<div>
                       <h1>Bienvenido a Mi Página Web</h1>";
                if (!isset($_SESSION["nombre"]) && $pagina_actual == "index.php") {
                        echo "</div>";
                } else if (!isset($_SESSION["nombre"]) && $pagina_actual == "nosotros.php") {
                        echo "<h2>Necesitas una cuenta para estar aquí</h2>
                        <br>
                        <p> Redirigiendo... </p>
                              </div>";
                        header('Refresh: 5; url=registro.php');
                        $privilegios = false;
                } else if (!isset($_SESSION["nombre"]) && $pagina_actual == "servicios.php") {
                        echo "<h2>Necesitas una cuenta para estar aquí</h2>
                        <br>
                        <p> Redirigiendo... </p>
                              </div>";
                        header('Refresh: 5; url=registro.php');
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
</header>

<?php
echo menu_navegacion();
if (!$privilegios) {
        die();
}
?>