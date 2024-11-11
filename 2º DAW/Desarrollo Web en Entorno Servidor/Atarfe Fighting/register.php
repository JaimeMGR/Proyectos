<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hash de la contraseña
    $usuario = $_POST['usuario'];
    $telefono = $_POST['telefono'];

    // Procesar y guardar la foto
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto = 'fotos/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    } else {
        $foto = NULL; // Si no se sube foto, se deja como NULL
    }

    // Preparar la consulta de inserción con parámetros
    $query = "INSERT INTO socio (nombre, edad, contrasena, usuario, telefono, foto) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);

    // Enlazar los parámetros (s: string, i: integer)
    $stmt->bind_param("sissss", $nombre, $edad, $contrasena, $usuario, $telefono, $foto);

    // Ejecutar la consulta e informar del resultado
    if ($stmt->execute()) {
        echo "Registro exitoso";
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
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <div class="logo">
            <a href="index.php">
                <img id="logo" src="imagenes/AtarfeFighting.png" href="index.php"></img>
            </a>
        </div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="entrenadores.php">Entrenadores</a>
            <a href="servicios.php">Servicios</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
            <a class="register" href="register.php">Registrarse</a>
            </div>
        </nav>


    </header>

    <main>
        <h2>Registro de Socio</h2>

        <form action="register.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono">

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*">

            <button type="submit">Registrar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Atarfe Fighting Club. Todos los derechos reservados.</p>
    </footer>

</body>

</html>