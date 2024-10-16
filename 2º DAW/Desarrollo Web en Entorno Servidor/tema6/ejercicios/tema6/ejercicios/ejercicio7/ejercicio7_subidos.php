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
    // Obtener el nombre de usuario
    $usuario = $_POST['usuario'];

    // Verificar si el archivo fue subido sin errores
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // Obtener detalles del archivo subido
        $file = $_FILES['file'];
        $nombrefoto = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Definir el directorio "usuarios" y la carpeta del usuario
        $userDir = 'usuarios/' . $usuario;

        // Si la carpeta del usuario no existe, crearla
        if (!is_dir($userDir)) {
            mkdir($userDir, 0777, true); // Crea la carpeta con permisos
        }

        // Mover el archivo a la carpeta del usuario
        $uploadPath = $userDir . '/' . $nombrefoto;
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            // Redirigir de vuelta al formulario con mensaje de éxito
            header("Location: ejercicio7_subidos.php?success=true&file=$nombrefoto&user=$usuario");
            exit();
        } else {
            echo "Error al mover el archivo. Inténtalo de nuevo.";
        }
    } else {
        echo "Error: No se ha subido ningún archivo o ocurrió un error durante la subida.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
</body>
</html>