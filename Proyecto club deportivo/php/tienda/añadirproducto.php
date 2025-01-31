<?php
include '../esencial/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/añadirproducto.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php'; ?>
    
    <main>
        <h2 style="font-weight: bold;">Añadir Nuevo Producto</h2>

        <form action="crearproducto.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Introduce el nombre del producto">

            <label for="compania">Compañía:</label>
            <input type="text" name="compania" id="compania" placeholder="Introduce la compañía del producto">

            <label for="precio">Precio (€):</label>
            <input type="number" step="0.01" name="precio" id="precio" placeholder="Introduce el precio">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="imagen/*">

            <button type="submit">Registrar Producto</button>
        </form>
    </main>

    <?php include '../esencial/footer.php'; ?>
</body>

</html>
