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

$conexion=conectar($nombre_host,$nombre_usuario,$password_db,$nombre_db);

// Consulta SQL para obtener los alumnos ordenados por edad
$sentencia = "SELECT nombre_completo, dni, edad FROM Alumnos ORDER BY edad ASC";
$consulta = $conexion->prepare($sentencia);

// Ejecutar la consulta
$consulta->execute();

// Enlazar resultados a variables
$consulta->bind_result($nombre_completo, $dni, $edad);

// Crear la tabla si hay resultados
echo "<table border='1'>
        <tr>
            <th>NOMBRE</th>
            <th>DNI</th>
            <th>EDAD</th>
        </tr>";

// Mostrar cada fila de los resultados
while ($consulta->fetch()) {
    echo "<tr>
            <td>" . $nombre_completo . "</td>
            <td>" . $dni . "</td>
            <td>" . $edad . "</td>
          </tr>";
}

echo "</table>";

// Cerrar la consulta y la conexión
$consulta->close();
$conexion->close();
?>
</body>
</html>