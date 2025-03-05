<?php
/**
 * Mostrar una lista de los archivos que hay en un directorio
 */
// Directorio que queremos escanear
$directorio = 'imagenes/';

// Función para verificar si un archivo es una imagen
function esImagen($ruta) {
    $tipoMime = mime_content_type($ruta);
    return strpos($tipoMime, 'image/') === 0;
}

//Función para mostrar las imágenes
function mostrarImagen($directorio, $imagen){
    echo "<img src='$directorio$imagen' alt='imagen de prueba' width='200px'>";
}

// Comprobamos si el directorio existe
if (is_dir($directorio)) {
    // Abrimos el directorio
    if ($dh = opendir($directorio)) {
        echo "<h2>Archivos de imagen en el directorio 'imagenes':</h2>";
        echo "<ul>";
        
        // Leemos cada entrada del directorio
        while (($archivo = readdir($dh)) !== false) {
            // Ignoramos . y ..
            if ($archivo != "." && $archivo != "..") {
                $rutaCompleta = $directorio . $archivo;
                // Verificamos si es una imagen
                if (esImagen($rutaCompleta)) {
                    echo "<li>$archivo</li>";
                    mostrarImagen($directorio, $archivo);
                }
            }
        }
        
        echo "</ul>";
        
        // Cerramos el directorio
        closedir($dh);
    }
} else {
    echo "El directorio 'imagenes' no existe.";
}
?>