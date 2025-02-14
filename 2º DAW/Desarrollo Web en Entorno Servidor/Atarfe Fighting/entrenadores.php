<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros - Atarfe Fighting</title>
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
        <h2>Entrenadores</h2>
        <p>En Atarfe Fighting Club, contamos con un equipo de entrenadores altamente capacitados y dedicados a ayudarte a alcanzar tus metas deportivas. Cada uno de ellos aporta su experiencia y pasión por las artes marciales y el entrenamiento físico, ofreciendo una guía personalizada para todos nuestros socios, sin importar su nivel o categoría. Aquí podrás conocer a nuestros entrenadores, las categorías que lideran y un poco más sobre su rol en el club. ¡Estamos aquí para apoyarte en tu camino hacia el éxito y el crecimiento personal!</p>

        <div class="entrenador-container">
            <?php
            // Preparar la consulta con una declaración preparada
            $query = "SELECT nombre, categorias, foto FROM entrenadores";
            $stmt = $conexion->prepare($query);

            // Ejecutar la consulta
            $stmt->execute();

            // Enlazar las variables para recibir los resultados
            $stmt->bind_result($nombre, $categorias, $foto);

            // Procesar los resultados
            if ($stmt->fetch()) {
                do {
                    echo "<div class='entrenador-card'>";
                    echo "<div class='entrenador-foto'><img src='" . $foto . "' alt='Foto de " . $nombre . "'></div>";
                    echo "<div class='entrenador-info'>";
                    echo "<h3>" . $nombre . "</h3>";
                    echo "<p><strong>Categorías:</strong> " . $categorias . "</p>";
                    echo "</div>";
                    echo "</div>";
                } while ($stmt->fetch());
            } else {
                echo "<p>No hay socios registrados.</p>";
            }

            // Cerrar la declaración y la conexión
            $stmt->close();
            $conexion->close();
            ?>

        </div>
    </main>

    <footer>
        <p>&copy; 2024 Atarfe Fighting Club. Todos los derechos reservados.</p>
    </footer>

</body>

</html>