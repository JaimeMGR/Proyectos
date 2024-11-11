<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atarfe Fighting</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="app.js">header()</script>
    <!-- llama a u -->
</head>

<body>

<header>
<!-- Llama a una funcion del archivo javascript -->
<script>
        // Llamar a la función Header cuando el DOM esté listo
        document.addEventListener("DOMContentLoaded", Header);
    </script>





    </header>

    <main>
        

        <!-- Sobre Nosotros -->
        <section>
            <h2>Sobre Nosotros</h2>
            <p>Atarfe Fighting es un club dedicado al arte del combate, con un enfoque en disciplina, fuerza y técnica. Nos especializamos en entrenamientos de boxeo, Muay Thai, y otras disciplinas de combate. Únete a nosotros para mejorar tus habilidades, entrenar con profesionales y competir en torneos.</p>
        </section>
        <!-- Galería de Imágenes -->
        <section>
            <div class="gallery">
                <img src="https://lh3.googleusercontent.com/p/AF1QipMLQSgWd5RaedvRf1ANWNNJO90Es-QadSf5XqPx=s680-w680-h510" alt="Entrenamiento en el club">
                <img src="https://muaythaigranada.es/wp-content/uploads/2022/01/MuaythaiClasesTodosNiveles-1.jpg" alt="Competencia de kickboxing">
                <img src="https://i.blogs.es/bed467/boxeo-entrenamiento/840_560.jpg" alt="Miembros entrenando">
            </div>
        </section>
        <br>
        <!-- Horarios de Entrenamiento -->
        <section>
            <h2>Horarios de Entrenamiento</h2>
            <ul>
                <li>Lunes a Jueves: 17:00 - 21:30</li>
                <li>Sábados: 10:00 - 13:00 (Clases Especiales)</li>
            </ul>
        </section>

        <!-- Beneficios de Unirse -->
        <section>
            <h2>Beneficios de Unirse</h2>
            <ul>
                <li>Acceso a entrenadores certificados y con experiencia</li>
                <li>Programas de entrenamiento personalizados</li>
                <li>Ambiente inclusivo y motivador</li>
                <li>Oportunidades para competir en torneos locales y nacionales</li>
            </ul>
        </section>
        <br>
        <!-- Testimonios de Miembros -->
        <section>
            <h2>Testimonios</h2>
            
            <div class="testimonio-container">
            <?php
            $query = "SELECT testimonio.contenido, testimonio.fecha, socio.nombre AS autor FROM testimonio JOIN socio ON testimonio.autor = socio.id_socio";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='testimonio-card'>";
                    echo "<div class='testimonio-info'>";
                    echo "<blockquote>" .'"' . $row['contenido']. '"' . ' - ' . $row['autor'] . "</blockquote>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay socios registrados.</p>";
            }

            $conexion->close();
            ?>
        </section>

        <!-- Galería de Imágenes -->
        <section style="text-align:center">
        <a class="register" href="register.php">¡Inscríbete ya!</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Atarfe Fighting Club. Todos los derechos reservados.</p>
    </footer>

</body>

</html>