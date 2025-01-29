<?php
include '../esencial/conexion.php';

// Recibir los datos del formulario
$titulo = $_POST['titulo'];
$company = $_POST['company'];
$precio = $_POST['precio'];
$imagen = $_FILES['imagen']['name'];

// Procesar y guardar la imagen
if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
    $imagen_ruta = "imagenes/" . basename($_FILES['imagen']['name']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], "../../$imagen_ruta");
} else {
    $imagen_ruta = NULL; // Si no se sube imagen, se deja como NULL
}

// Si ya existe una foto con ese nombre, cambiar el nombre
if (file_exists("productos/$imagen")) {
    $imagen_ruta = "imagenes/" . time() . "_" . basename($_FILES['imagen']['name']);
}

// Preparar la consulta de inserción con parámetros
$query = "INSERT INTO `productos`(`titulo`, `company`, `precio`, `imagen`) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($query);

// Enlazar los parámetros (s: string, d: double)
$stmt->bind_param("ssds", $titulo, $company, $precio, $imagen_ruta);

// Ejecutar la consulta e informar del resultado
if ($stmt->execute()) {
    echo "Producto creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();

header('Refresh: 0.1; url=productos.php');
