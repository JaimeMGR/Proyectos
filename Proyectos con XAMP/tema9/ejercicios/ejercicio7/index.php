<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos.css">
    <title>Consulta de Alumnos Matriculados</title>
</head>

<body>
    <?php
    require_once "config.php";
    require_once "funciones.php";

    $conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);

    // Obtener asignaturas para la lista desplegable
    $asignaturas = $conexion->query("SELECT id_asignatura, nombre_asignatura FROM Asignaturas");

    // Procesar el formulario y mostrar los alumnos
    $resultado = null;
    if (isset($_POST['id_asignatura']) && isset($_POST['año'])) {
        $id_asignatura = $_POST['id_asignatura'];
        $año = $_POST['año'];

        // Consultar los alumnos matriculados en la asignatura y año seleccionados usando prepare y bind_param
        $sentencia = "SELECT Alumnos.nombre_completo 
                  FROM Matriculas 
                  INNER JOIN Alumnos ON Matriculas.dni_alumno = Alumnos.dni
                  WHERE Matriculas.id_asignatura = ? AND Matriculas.anio = ?";

        $consulta = $conexion->prepare($sentencia);
        $consulta = $conexion->prepare($sentencia);
        if (!$consulta) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $consulta->bind_param("ii", $id_asignatura, $año);
        $consulta->execute();
        $consulta->bind_result($nombre_completo);

        // Guardar los resultados en un array para mostrarlos en la tabla
        $resultado = [];
        while ($consulta->fetch()) {
            $resultado[] = $nombre_completo;
        }

        // Cerrar la consulta y conexión
        $consulta->close();
        $conexion->close();
    }
    ?>
    <h2>Consultar Alumnos Matriculados</h2>
    <form action="matriculas.php" method="POST">
        <label for="id_asignatura">Asignatura:</label>
        <select name="id_asignatura" id="id_asignatura" required>
            <?php
            while ($asignatura = $asignaturas->fetch_assoc()) {
                echo '<option value="' . $asignatura['id_asignatura'] . '">' . $asignatura['nombre_asignatura'] . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="año">Año:</label>
        <input type="number" name="año" id="año" required min="2000" max="2100">
        <br><br>

        <button type="submit">Consultar</button>
    </form>

    <?php if ($resultado): ?>
        <h3>Alumnos Matriculados:</h3>
        <ul>
            <?php
            foreach ($resultado as $nombre_completo) {
                echo '<li>' . $nombre_completo . '</li>';
            }
            ?>
        </ul>
    <?php elseif (isset($_POST['id_asignatura'])): ?>
        <p>No se encontraron alumnos matriculados en esta asignatura y año.</p>
    <?php endif; ?>
</body>

</html>