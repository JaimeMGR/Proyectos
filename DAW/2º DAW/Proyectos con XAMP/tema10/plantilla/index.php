<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="sesion_ingles.php">Elije Inglés</a></h1>
    <h1><a href="sesion_spanish.php">Elije Español</a></h1>

    <form method="POST" action="destruir_sesion.php">
        <button type="submit">Destruir sesion</button>
    </form>
    <?php
    session_start();
    $id = session_id();
    $nombre = session_name();

    if(!isset($_SESSION["idioma"])){
        echo "No hay idioma, creando sesión nueva....";
        $_SESSION["idioma"] = "Español           ";
    }


    $idioma=$_SESSION["idioma"];


        echo "<table border>";
        echo "<tr><td> Nombre Sesión </td><td> $nombre </td></tr>";
        echo "<tr><td> Idioma Sesión </td><td> $idioma </td></tr>";
        echo "</table>";
    ?>
</body>
</html>