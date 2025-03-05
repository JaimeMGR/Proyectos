<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Registrar matrícula</title>
</head>

<body>
    <?php
    require_once "config.php";
    require_once "funciones.php";

    $conexion = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);


    // Obtener alumnos para la lista desplegable
    $alumnos = $conexion->query("SELECT dni, nombre_completo FROM Alumnos");

    // Obtener asignaturas para la lista desplegable
    $asignaturas = $conexion->query("SELECT id_asignatura, nombre_asignatura FROM Asignaturas");

    // Insertar matrícula cuando se envía el formulario
    if (isset($_POST['dni']) && isset($_POST['id_asignatura']) && isset($_POST['nota'])) {
        $dni = $_POST['dni'];
        $id_asignatura = $_POST['id_asignatura'];
        $nota = $_POST['nota'];
        $year = date("Y");

        // Insertar la nueva matrícula
        $sentencia = "INSERT INTO Matriculas (dni_alumno, id_asignatura, nota, anio) VALUES ('$dni', '$id_asignatura', '$nota', '$year')";
        $consulta = $conexion->prepare($sentencia);

        // Ejecutar la consulta
        $consulta->execute();


        echo "Matrícula registrada correctamente.";

    // Cerrar la consulta y la conexión
    $consulta->close();
    $conexion->close();
}
    ?>
    <h2>Registrar Nueva Matrícula</h2>
    <form method="POST">
        <label for="dni">Alumno:</label>
        <select name="dni" id="dni" required>
            <?php
            while ($alumno = $alumnos->fetch_assoc()) {
                echo '<option value="' . $alumno['dni'] . '">' . $alumno['nombre_completo'] . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="id_asignatura">Asignatura:</label>
        <select name="id_asignatura" id="id_asignatura" required>
            <?php
            while ($asignatura = $asignaturas->fetch_assoc()) {
                echo '<option value="' . $asignatura['id_asignatura'] . '">' . $asignatura['nombre_asignatura'] . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="nota">Nota:</label>
        <select name="nota" id="nota" required>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
        <br><br>

        <button type="submit">Registrar Matrícula</button>
    </form>
</body>

</html>