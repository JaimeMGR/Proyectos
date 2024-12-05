<?php
include '../esencial/conexion.php';
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Noticia - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/añadirnoticia.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2 style="font-weight: bold;">Nuevo Servicio</h2>

        <form action="crearnoticia.php" method="post" enctype="multipart/form-data">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo">

            <label for="contenido">Contenido:</label>
            <input type="text" name="contenido" id="contenido">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="*.jpeg">

            <button type="submit">Registrar</button>
        </form>
        <div id="error-container" style="color: red; font-size: 14px;"></div>

        
    </main>
<?php include '../esencial/footer.php' ?>
</body>

</html>