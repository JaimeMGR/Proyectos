<?php
if (isset($_SESSION["nombre"]) && $pagina_actual == "cerrar_sesion.php" && $_SESSION["tipo"] != "admin") {
    session_start();
    session_destroy();
    header("Location:index.php");
}else{
    header("Location:usuarios.php");
}
?>