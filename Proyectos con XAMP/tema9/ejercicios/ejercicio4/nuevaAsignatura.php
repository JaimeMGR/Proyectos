<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "config.php";
    require_once "funciones.php";

    $conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

    $nombre_asignatura = trim($_POST['nombre_asignatura']);
    $creditos = trim($_POST['creditos']);

    if ($nombre_asignatura == "" || $creditos == "") {
        echo "Todos los campos son obligatorios";
        exit;
    } else {

        // Consulta SQL para obtener los alumnos ordenados por edad
        $sentencia = "INSERT INTO `asignaturas` (`id_asignatura`, `nombre_asignatura`, `creditos`) VALUES (NULL, '$nombre_asignatura', '$creditos')";
        $consulta = $conexion->prepare($sentencia);

        // Ejecutar la consulta
        $consulta->execute();

        echo "Asignatura creada correctamente";

        // Cerrar la consulta y la conexión
        $consulta->close();
        $conexion->close();
    }
    ?>
</body>

</html>