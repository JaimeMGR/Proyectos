<?php
include 'conexion.php';

$mensaje_enviado = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Guardar mensaje en la base de datos (opcional)
    $query = "INSERT INTO mensajes_contacto (nombre, email, mensaje) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        $mensaje_enviado = true;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Atarfe Fighting</title>
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
        <h2>Contacto</h2>

        <?php if ($mensaje_enviado): ?>
            <p>Gracias por tu mensaje, <?php echo htmlspecialchars($nombre); ?>. Nos pondremos en contacto contigo pronto.</p>
        <?php else: ?>
            <form action="contacto.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Atarfe Fighting Club. Todos los derechos reservados.</p>
    </footer>

</body>

</html>