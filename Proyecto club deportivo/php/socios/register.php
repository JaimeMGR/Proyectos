<?php
include '../esencial/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hash de la contraseña
    $usuario = $_POST['usuario'];
    $telefono = $_POST['telefono'];

    // Procesar y guardar la foto
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto = basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], "../../imagenes/$foto");
    } else {
        $foto = NULL; // Si no se sube foto, se deja como NULL
    }

    // Si ya existe una foto con ese nombre, cambiar el nombre
    if (file_exists("../../imagenes/$foto")) {
        $foto = time(). "_". $foto;
    }

    // Preparar la consulta de inserción con parámetros
    $query = "INSERT INTO socio (nombre, edad, contrasena, usuario, telefono, foto) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);

    // Enlazar los parámetros (s: string, i: integer)
    $stmt->bind_param("sissss", $nombre, $edad, $contrasena, $usuario, $telefono, $foto);

    // Ejecutar la consulta e informar del resultado
    if ($stmt->execute()) {
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/register.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2 style="font-weight: bold;">Registro de Socio</h2>

        <form action="register.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre y apellidos">

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placehoder="Introduce tu nombre de usuario">
            
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad">

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" placeholder="Introduce tu contraseña">

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" placeholder="Introduce tu número de teléfono">

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*">

            <button type="submit">Registrar</button>
        </form>
    </main>
    <?php include '../esencial/footer.php' ?>

</body>

</html>