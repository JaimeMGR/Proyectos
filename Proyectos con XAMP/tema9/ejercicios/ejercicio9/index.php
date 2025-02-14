<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Eliminar Asignatura</title>
</head>
<body>
    <h2>Eliminar Asignatura</h2>
    <form action="eliminar.php" method="POST">
        <label for="id_asignatura">Selecciona una Asignatura para Eliminar:</label>
        <select name="id_asignatura" id="id_asignatura" required>
            <?php
            require_once "config.php";
            require_once "funciones.php";
            
            $conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

            // Obtener todas las asignaturas para la lista desplegable
            $asignaturas = $conexion->query("SELECT id_asignatura, nombre_asignatura FROM Asignaturas");
            while ($asignatura = $asignaturas->fetch_assoc()) {
                echo '<option value="' . $asignatura['id_asignatura'] . '">' . $asignatura['nombre_asignatura'] . '</option>';
            }
            $asignaturas->free();
            ?>
        </select>
        <br><br>
        <button type="submit" name="eliminar">Eliminar Asignatura</button>
    </form>
</body>
</html>
