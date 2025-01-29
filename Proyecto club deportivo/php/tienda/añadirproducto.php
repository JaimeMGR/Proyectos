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
            <label for="id">ID del Producto:</label>
            <input type="text" name="id" id="id" placeholder="Introduce un ID único para el producto">

            <label for="title">Título:</label>
            <input type="text" name="title" id="title" placeholder="Introduce el nombre del producto">

            <label for="company">Compañía:</label>
            <input type="text" name="company" id="company" placeholder="Introduce la compañía del producto">

            <label for="price">Precio (€):</label>
            <input type="number" step="0.01" name="price" id="price" placeholder="Introduce el precio">

            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image" accept="image/*">

            <button type="submit">Registrar Producto</button>
        </form>
    </main>

    <?php include '../esencial/footer.php'; ?>
</body>

</html>
