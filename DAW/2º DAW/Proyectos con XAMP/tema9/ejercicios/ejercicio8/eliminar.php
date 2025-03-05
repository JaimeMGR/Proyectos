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


    $id_matricula = $_GET['id_matricula'];

    // Preparar la sentencia para borrar la matrícula
    $sentencia = "DELETE FROM Matriculas WHERE id_matricula = ?";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bind_param("i", $id_matricula);

    if ($consulta->execute()) {
        echo "La matrícula ha sido eliminada correctamente.";
    } else {
        echo "Error al eliminar la matrícula.";
    }

    $consulta->close();
    $conexion->close();
?>
</body>
</html>

