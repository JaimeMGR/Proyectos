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


    //Nombre enviado por el formulario
    $nombre_completo = trim($_POST['nombre_completo']);


    // Consulta SQL para obtener los datos del alumno segun el nombre
    $sentencia = "SELECT `alumnos`.`nombre_completo`, `matriculas`.`id_matricula`, `asignaturas`.`nombre_asignatura`, `matriculas`.`anio` FROM `alumnos` LEFT JOIN `matriculas` ON `matriculas`.`dni_alumno` = `alumnos`.`dni` LEFT JOIN `asignaturas` ON `matriculas`.`id_asignatura` = `asignaturas`.`id_asignatura` WHERE nombre_completo = '$nombre_completo';";

    $consulta = $conexion->prepare($sentencia);

    // Ejecutar la consulta
    $consulta->execute();

    // Enlazar resultados a variables
    $consulta->bind_result($nombre_completo, $id_asignatura, $nombre_asignatura, $anio);


    // Crear la tabla si hay resultados
    echo "<table border='1'>
                <tr>
                    <th>ALUMNO</th>
                    <th>ASIGNATURA</th>
                    <th>AÑO</th>
                </tr>";

    // Mostrar cada fila de los resultados
    while ($consulta->fetch()) {
        echo "<tr>
                    <td>" . $nombre_completo . "</td>
                    <td>" . $nombre_asignatura . "</td>
                    <td>" . $anio . "</td>
                </tr>";
    }
    echo "</table>";


    // Cerrar la consulta y la conexión
    $consulta->close();
    $conexion->close();
    ?>


</body>

</html>