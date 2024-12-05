<?php
include '../esencial/conexion.php';
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/añadirtestimonio.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2 style="font-weight: bold;">Añadir testimonio</h2>

        <form action="creartestimonio.php" method="post" enctype="multipart/form-data">
            <label for="contenido">Contenido:</label>
            <input type="text" name="contenido" id="contenido" placeholder="Escriba aquí">

            <label for="socio">Socio:</label>
            <select name="socio" id="socio" class="form-select" required>
                <option value="" hidden>Seleccione un socio</option>
                <?php
                // Preparar la consulta con una declaración preparada
                $querysocios = "SELECT id_socio, nombre  FROM socio";
                $stmt = $conexion->prepare($querysocios);

                // Ejecutar la consulta
                $stmt->execute();

                // Enlazar las variables para recibir los resultados
                $stmt->bind_result($id_socio, $nombre);

                $contador = 0;

                // Procesar los resultados
                if ($stmt->fetch()) {
                    do {
                        $contador++;
                        echo "<option value='$id_socio'> $nombre </option>";
                    } while ($stmt->fetch());
                }
                // Cerrar la declaración y la conexión
                $stmt->close();
                ?>
            </select>

            <button type="submit">Registrar</button>
        </form>
        <div id="error-container" style="color: red; font-size: 14px; margin-top: 10px;"></div>
    </main>
    <?php include '../esencial/footer.php' ?>

</body>

</html>