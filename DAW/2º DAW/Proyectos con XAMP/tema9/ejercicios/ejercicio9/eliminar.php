<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Asignatura eliminada</title>
</head>
<body>
<?php
require_once "config.php";
require_once "funciones.php";

$conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

        // Obtener la asignatura seleccionada
        $id_asignatura = $_POST['id_asignatura'];

        // Eliminar las matrículas relacionadas con la asignatura
        $sentencia = "DELETE FROM Matriculas WHERE id_asignatura = ?";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bind_param("i", $id_asignatura);

        if ($consulta->execute()) {
            echo "Matrículas relacionadas eliminadas correctamente.<br>";

            // Eliminar la asignatura después de las matrículas
            $sentencia_asignatura = "DELETE FROM Asignaturas WHERE id_asignatura = ?";
            $consulta_asignatura = $conexion->prepare($sentencia_asignatura);
            $consulta_asignatura->bind_param("i", $id_asignatura);

            if ($consulta_asignatura->execute()) {
                echo "Asignatura eliminada correctamente.";
            } else {
                echo "Error al eliminar la asignatura.";
            }

            $consulta_asignatura->close();
        } else {
            echo "Error al eliminar las matrículas relacionadas.";
        }

        $consulta->close();
        $conexion->close();
    ?>
</body>
</html>