<?php
include '../esencial/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2 style="font-weight: bold;">Testimonios</h2>
        <section style="text-align:center">
            <a class="btn btn-warning" href="añadirtestimonio.php">Añadir testimonio</a>
        </section>
        <br>
        <div class="testimonio-container">
            <?php
            $query = "SELECT testimonio.contenido, testimonio.fecha AS fecha, socio.nombre AS autor FROM testimonio JOIN socio ON testimonio.autor = socio.id_socio ORDER BY fecha DESC";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='testimonio-card'>";
                    echo "<div class='testimonio-info'>";
                    echo "<blockquote class='testimonio-content'style='background:white';>" . '"' . $row['contenido'] . '"' . ' | ' . $row['autor'] . " | " . $row['fecha'] . "</blockquote>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay socios registrados.</p>";
            }

            $conexion->close();
            ?>


        </div>
    </main>
    <?php include '../esencial/footer.php' ?>

</body>

</html>