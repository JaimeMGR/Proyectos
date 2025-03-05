<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Ruta temporal de los archivos
$imagen1 = $_FILES['imagen1'];
$imagen2 = $_FILES['imagen2'];

// Función para verificar si el archivo es una imagen
function comprobarImagen($archivo) {
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    return in_array($archivo['type'], $tiposPermitidos);
}

// Verificar si ambos archivos son imágenes
if (comprobarImagen($imagen1) && comprobarImagen($imagen2)) {
    // Obtener el tamaño de las imágenes
    $tamaño1 = $imagen1['size'];
    $tamaño2 = $imagen2['size'];

    // Ordenar imágenes por tamaño
    if ($tamaño1 > $tamaño2) {
        $mayor = $imagen1;
        $menor = $imagen2;
    } else {
        $mayor = $imagen2;
        $menor = $imagen1;
    }

    // Mover archivos a una ubicación permanente
    move_uploaded_file($mayor['tmp_name'], 'imágenes/' . $mayor['name']);
    move_uploaded_file($menor['tmp_name'], 'imágenes/' . $menor['name']);

    // Mostrar las imágenes ordenadas por tamaño
    echo "<h2>Imágenes subidas:</h2>";
    echo "<p>Imagen de menor tamaño:</p>";
    echo "<img src='imágenes/" . $menor['name'] . "' width='300'><br><br>";
    echo "<p>Imagen de mayor tamaño:</p>";
    echo "<img src='imágenes/" . $mayor['name'] . "' width='300'>";
} else {
    echo "Ambos archivos deben ser imágenes.";
}
?>
</body>
</html>