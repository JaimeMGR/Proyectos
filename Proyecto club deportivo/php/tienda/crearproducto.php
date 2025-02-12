<?php
include '../esencial/conexion.php';

// Recibir los datos del formulario
$titulo = $_POST['nombre'];
$company = $_POST['compania'];
$precio = $_POST['precio'];
$imagen = $_FILES['imagen']['name'];
$categoria = $_POST['categoria'];

// Definir carpeta de destino
$directorio_destino = "productos/";

// Asegurar que la carpeta de destino existe
if (!is_dir($directorio_destino)) {
    mkdir($directorio_destino, 0777, true);
}

// Generar un nombre único para la imagen
$nombre_archivo = "producto-" . time() . "_" . basename($_FILES['imagen']['name']);
$imagen_ruta = $directorio_destino . $nombre_archivo;

// Mover la imagen a la carpeta correcta
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_ruta)) {
    $imagen_ruta = "productos/" . $nombre_archivo; // Ruta relativa para la base de datos
} else {
    $imagen_ruta = NULL; // En caso de error al subir
}

// Preparar la consulta de inserción con parámetros
$query = "INSERT INTO `productos`(`nombre`, `companía`, `precio`, `imagen`, `Categoría`) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($query);

// Enlazar los parámetros (s: string, d: double)
$stmt->bind_param("ssdss", $titulo, $company, $precio, $imagen_ruta, $categoria);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Obtener la ID generada automáticamente
    $producto_id = (string) $stmt->insert_id; // Convertir a string
    echo "Producto creado con éxito";
} else {
    echo "Error: " . $stmt->error;
    exit(); // Detener ejecución si hay error
}

// Cerrar la declaración
$stmt->close();

// Ruta del archivo lista_productos.js
$archivo_js = "lista_productos.js";

// Verificar si el archivo existe, si no, crearlo con una lista vacía
if (!file_exists($archivo_js)) {
    file_put_contents($archivo_js, "let lista = {};");
}

// Leer el contenido actual del archivo
$contenido_js = file_get_contents($archivo_js);

// Extraer la parte JSON del archivo
preg_match('/lista\s*=\s*({.*})/s', $contenido_js, $matches);

if (isset($matches[1])) {
    $json_actual = json_decode($matches[1], true);
} else {
    $json_actual = [];
}

// Agregar el nuevo producto con su ID como clave
$json_actual[$producto_id] = [
    "id" => $producto_id,
    "title" => $titulo,
    "company" => $company,
    "image" => $imagen_ruta,
    "price" => floatval($precio),
    "category" => $categoria
];

// Convertir de nuevo a JSON
$nuevo_json = json_encode($json_actual, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Reemplazar la parte de la lista en el archivo JS
$contenido_js = "let lista = " . $nuevo_json . ";";

// Guardar el archivo actualizado
file_put_contents($archivo_js, $contenido_js);

// Redirigir a la página de la tienda
header('Location: tienda.php');
exit();
