<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["nombre"]) || $_POST["nombre"] == "") {
            $nombre="Anónimo";
        } else {
            $nombre = $_POST["nombre"];
        }

        if(isset($_POST["apellidos"]) || $_POST["apellidos"]==""){
            $apellidos="Apellidos desconocidos";
        } else {
            $apellidos = $_POST["apellidos"];
        }

        if(isset($_POST["email"]) || $_POST["email"]==""){
            $email="Correo electrónico desconocido";
        } else {
            $email = $_POST["email"];
        }

        $fecha_nac = $_POST["fnac"];
        $seccion = $_POST["seccion"];
        $suscripcion = $_POST["suscripcion"];
        $consulta = $_POST["consulta"];

        echo "<p>Nombre: $nombre</p>";
        echo "<p>Apellidos: $apellidos</p>";
        echo "<p>Correo electrónico: $email</p>";
        echo "<p>Fecha de nacimiento: $fecha_nac</p>";
        echo "<p>email: $email</p>";
        echo "<p>Sección favorita: $seccion</p>";
        echo "<p>Desea suscribirse: $suscripcion</p>";
        echo "<p>Consulta: $consulta</p>";
    ?>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["nombre"]) || $_POST["nombre"] == "") {
            $nombre="Anónimo";
        } else {
            $nombre = $_POST["nombre"];
        }

        if(isset($_POST["apellidos"]) || $_POST["apellidos"]==""){
            $apellidos="Apellidos desconocidos";
        } else {
            $apellidos = $_POST["apellidos"];
        }

        if(isset($_POST["email"]) || $_POST["email"]==""){
            $email="Correo electrónico desconocido";
        } else {
            $email = $_POST["email"];
        }

        $fecha_nac = $_POST["fnac"];
        $seccion = $_POST["seccion"];
        $suscripcion = $_POST["suscripcion"];
        $consulta = $_POST["consulta"];

        echo "<p>Nombre: $nombre</p>";
        echo "<p>Apellidos: $apellidos</p>";
        echo "<p>Correo electrónico: $email</p>";
        echo "<p>Fecha de nacimiento: $fecha_nac</p>";
        echo "<p>email: $email</p>";
        echo "<p>Sección favorita: $seccion</p>";
        echo "<p>Desea suscribirse: $suscripcion</p>";
        echo "<p>Consulta: $consulta</p>";
    ?>
</body>
>>>>>>> Stashed changes
</html>