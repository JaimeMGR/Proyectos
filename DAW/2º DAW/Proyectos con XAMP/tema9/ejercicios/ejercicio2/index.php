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

    // Consulta SQL para obtener los datos de la tabla 'matriculas'
    $sentencia = "SELECT id_matricula, dni_alumno, anio, nota FROM matriculas";
    $consulta = $conexion->prepare($sentencia);

    // Ejecutar la consulta
    $consulta->execute();

    // Enlazar resultados a variables
    $consulta->bind_result($id_matricula, $dni_alumno, $anio, $nota);

    // Crear la tabla si hay resultados
    echo "<table border='1'>
        <tr>
            <th>DNI</th>
            <th>CÓDIGO</th>
            <th>AÑO</th>
            <th>NOTA</th>
        </tr>";

    // Mostrar cada fila de los resultados
    while ($consulta->fetch()) {
        echo "<tr>
            <td>" . $dni_alumno . "</td>
            <td>" . $id_matricula . "</td>
            <td>" . $anio . "</td>
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