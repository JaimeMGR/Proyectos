<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Listado de Matrículas</title>
</head>
<body>
<?php
require_once "config.php";
require_once "funciones.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

// Consulta SQL para obtener los datos de las matrículas
$sentencia = "SELECT id_matricula, dni_alumno, id_asignatura, anio, nota FROM Matriculas ORDER BY anio ASC";
$consulta = $conexion->prepare($sentencia);
$consulta->execute();
$consulta->bind_result($id_matricula, $dni_alumno, $id_asignatura, $anio, $nota);

// Crear la tabla con los botones de eliminar
echo "<table border='1'>
        <tr>
            <th>DNI Alumno</th>
            <th>ID Asignatura</th>
            <th>Año</th>
            <th>Nota</th>
            <th>Acción</th>
        </tr>";

while ($consulta->fetch()) {
    echo "<tr>
            <td>$dni_alumno</td>
            <td>$id_asignatura</td>
            <td>$anio</td>
            <td>$nota</td>
            <td><a href='eliminar.php?id_matricula=$id_matricula'>Eliminar</a></td>
          </tr>";
}

echo "</table>";

$consulta->close();
$conexion->close();
?>
</body>
</html>
