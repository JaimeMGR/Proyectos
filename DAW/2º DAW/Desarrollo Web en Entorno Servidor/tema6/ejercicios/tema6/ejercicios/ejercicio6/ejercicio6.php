<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el DNI del formulario
    $dni = $_POST['dni'];

    // Verificar si el archivo fue subido sin errores
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        // Obtener detalles del archivo subido
        $file = $_FILES['cv'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Verificar que el archivo es un PDF y que no supere los 2MB
        if ($fileExt == 'pdf' && $fileSize <= 2 * 1024 * 1024) {
            // Definir el directorio donde se almacenará el CV
            $uploadDir = 'uploads/';
            $newFileName = $dni . '.pdf';  // Usar el DNI como nombre del archivo

            // Mover el archivo al directorio
            if (move_uploaded_file($fileTmpName, $uploadDir . $newFileName)) {
                echo "Registro exitoso. Tu CV ha sido subido correctamente.";
            } else {
                echo "Error al mover el archivo. Inténtalo de nuevo.";
            }
        } else {
            // Si no es un PDF o supera los 2MB
            echo "Error: El archivo debe ser un PDF y no debe superar los 2MB.";
            echo "<br><a href='index.html'>Volver al formulario</a>";
        }
    } else {
        // Si no se ha subido ningún archivo
        echo "Error: No se ha subido ningún archivo.";
        echo "<br><a href='index.html'>Volver al formulario</a>";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

</body>
</html>