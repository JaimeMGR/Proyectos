<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Documentos</title>
</head>
<body>
    <h1>Subida de Documentos</h1>

    <?php
    if (isset($_GET['exito']) && $_GET['exito'] == 'true') {
        $nombreArchivo = htmlspecialchars($_GET['archivo']);
        $nombreUsuario = htmlspecialchars($_GET['usuario']);
        echo "<p>El archivo <strong>$nombreArchivo</strong> del usuario <strong>$nombreUsuario</strong> ha sido subido correctamente.</p>";
    }
    ?>

    <form action="ejercicio7_subidos.php" method="post" enctype="multipart/form-data">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>

        <label for="archivo">Selecciona un archivo:</label>
        <input type="file" id="archivo" name="archivo" required><br><br>

        <input type="submit" value="Subir archivo">
    </form>
</body>
</html>
