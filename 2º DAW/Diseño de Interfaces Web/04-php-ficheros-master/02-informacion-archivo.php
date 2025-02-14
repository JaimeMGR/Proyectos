<?php
function mostrarInfoArchivo($ruta) {
    if (!file_exists($ruta)) {
        return "El archivo no existe.";
    }

    $info = [];
    
    // Información básica
    $info['Nombre'] = basename($ruta);
    $info['Ruta'] = realpath($ruta);
    $info['Tamaño'] = filesize($ruta) . ' bytes';
    $info['Tipo MIME'] = mime_content_type($ruta);
    
    // Fechas
    $info['Fecha de último acceso'] = date("Y-m-d H:i:s", fileatime($ruta));
    $info['Fecha de última modificación'] = date("Y-m-d H:i:s", filemtime($ruta));
    $info['Fecha de creación'] = date("Y-m-d H:i:s", filectime($ruta));
    
    // Permisos
    $permisos = fileperms($ruta);
    $info['Permisos'] = substr(sprintf('%o', $permisos), -4);
    
    // Propietario y grupo
    //estas propiedades solo están disponibles en sistemas linux
    //$info['Propietario'] = posix_getpwuid(fileowner($ruta))['name'];
    //$info['Grupo'] = posix_getgrgid(filegroup($ruta))['name'];
    
    // Hash
    $info['MD5'] = md5_file($ruta);
    $info['SHA1'] = sha1_file($ruta);
    
    // Si es una imagen, obtenemos información adicional
    if (exif_imagetype($ruta)) {
        $imgInfo = getimagesize($ruta);
        $info['Dimensiones'] = $imgInfo[0] . 'x' . $imgInfo[1] . ' píxeles';
        $info['Tipo de imagen'] = $imgInfo['mime'];
        
        // Información EXIF si está disponible
        $exif = exif_read_data($ruta, 'IFD0');
        if ($exif !== false) {
            $info['Cámara'] = $exif['Make'] . ' ' . $exif['Model'] ?? 'No disponible';
            $info['Fecha de captura'] = $exif['DateTimeOriginal'] ?? 'No disponible';
        }
    }
    
    return $info;
}

// Ejemplo de uso
$rutaArchivo = 'imagenes/darth_vader.gif';
$informacion = mostrarInfoArchivo($rutaArchivo);

echo "<h2>Información del archivo: " . htmlspecialchars($rutaArchivo) . "</h2>";
echo "<ul>";
foreach ($informacion as $clave => $valor) {
    echo "<li><strong>" . htmlspecialchars($clave) . ":</strong> " . htmlspecialchars($valor) . "</li>";
}
echo "</ul>";
?>