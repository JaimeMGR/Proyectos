<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Atarfe Fighting</title>
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

        <section class="service-section">
            <h2>Servicios</h2>
            <?php
            // Preparar la consulta con una declaración preparada
            $query = "SELECT codigo_servicio, descripcion, duracion, imagen, horario FROM servicio";
            $stmt = $conexion->prepare($query);

            // Ejecutar la consulta
            $stmt->execute();

            // Enlazar las variables para recibir los resultados
            $stmt->bind_result($codigo_servicio, $descripcion, $duracion, $imagen, $horario);

            // Procesar los resultados
            if ($stmt->fetch()) {
                do {
                    echo "<div class='service-item'>";
                    echo "<div class='service-image'><img src='" . $imagen . "' alt='" . $descripcion . "'></div>";
                    echo "<div class='service-content'>";
                    echo "<h3 class='service-title'>" . $descripcion . "</h3>";
                    echo "<p class='service-timetable'>" . $horario . "</p>";
                    echo "<p> Duración: " . $duracion . "</p>";
                    echo "</div>";
                    echo "</div>";
                } while ($stmt->fetch());
            } else {
                echo "<p>No hay noticias disponibles.</p>";
            }

            // Cerrar la declaración y la conexión
            $stmt->close();
            $conexion->close();
            ?>

        </section>
    </main>

    <footer>
        <p>&copy; 2024 Atarfe Fighting Club. Todos los derechos reservados.</p>
    </footer>

</body>

</html>