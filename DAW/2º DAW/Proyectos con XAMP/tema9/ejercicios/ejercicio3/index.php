<!DOCTYPE html>
<html lang="es">

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

    // Consulta SQL para obtener los alumnos ordenados por edad
    $sentencia = "SELECT `nombre_completo`,`nombre_asignatura`, `anio`, `nota` FROM `centro`.`matriculas`,`alumnos`,`asignaturas` ";

    $consulta = $conexion->prepare($sentencia);

    // Ejecutar la consulta
    $consulta->execute();

    // Enlazar resultados a variables
    $consulta->bind_result($nombre_completo, $nombre_asignatura, $año, $nota);


    // Crear la tabla si hay resultados

    echo "<table border='1'>
            <tr>
                <th>ALUMNO</th>
                <th>ASIGNATURA</th>
                <th>AÑO</th>
                <th>NOTA</th>
            </tr>";

    // Mostrar cada fila de los resultados
    while ($consulta->fetch()) {
        echo "<tr>
                <td>" . $nombre_completo . "</td>
                <td>" . $nombre_asignatura . "</td>
                <td>" . $año . "</td>
                <td>" . $nota . "</td>
              </tr>";
    }
    echo "</table>";

    // Cerrar la consulta y la conexión
    $consulta->close();
    $conexion->close();
    ?>


</body>

</html>