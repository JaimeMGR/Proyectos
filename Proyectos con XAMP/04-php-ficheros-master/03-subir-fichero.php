<?php
// Configuración
define('MAX_FILE_SIZE', 1 * 1024 * 1024); // 1MB
define('TARGET_WIDTH', 300);
define('UPLOAD_DIR', 'uploads/');

// Función para comprobar si el archivo es una imagen válida
function esImagenValida($tmpName) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileInfo = @getimagesize($tmpName);
    
    if (!$fileInfo) {
        return false;
    }
    
    return in_array($fileInfo['mime'], $allowedTypes);
}

/**
 * Redimensiona una imagen manteniendo su proporción original.
 *
 * Esta función toma una imagen de origen, la redimensiona a un ancho específico
 * manteniendo su relación de aspecto, y guarda la imagen resultante en la ubicación
 * especificada. Soporta formatos JPEG, PNG y GIF.
 *
 * @param string $sourcePath  Ruta completa a la imagen de origen.
 * @param string $targetPath  Ruta completa donde se guardará la imagen redimensionada.
 * @param int    $targetWidth Ancho deseado para la imagen redimensionada en píxeles.
 *
 * @throws RuntimeException Si no se puede crear o procesar la imagen.
 *
 * @return void
 */
function redimensionarImagen($sourcePath, $targetPath, $targetWidth) {
    //getimagesize() devuelve las dimensiones y el tipo de la imagen original
    list($width, $height, $type) = getimagesize($sourcePath);
    //calcula la proporción y la altura basándose en el ancho deseado
    $ratio = $targetWidth / $width;
    $targetHeight = $height * $ratio;

    //imagecreatefromstring() crea una imagen en memoria a partir del archivo original
    //esta función forma parte de la biblioteca GD de PHP que se utiliza para crear y manipular imágenes
    //si PHP no reconoce esta función es posible que la extensión no esté habilitada
    //para habilitarla en php.ini hay que descomentar la línea extension=gd
    $sourceImage = imagecreatefromstring(file_get_contents($sourcePath));
    //imagecreatetruecolor() crea una imagen en blanco con las dimensiones calculadas
    $targetImage = imagecreatetruecolor($targetWidth, $targetHeight);

    //imagecopyresampled() redimensiona la imagen original y la copia en la nueva imagen
    /**
     * Argumentos: 
     * $targetImage - La imagen de destino, la nueva imagen redimensionada
     * $sourceImage - La imagen original
     * 0 - La coordenada X del punto de destino donde empezar a copiar en la imagen de destino
     * 0 - La coordenada y del punto de destino donde empezar a copiar en la imagen de destino
     * 0 - La coordenada x del punto de origen donde empezar a copiar desde la imagen de origen
     * 0 - La coordenada y del punto de origen donde empezar a copiar desde la imagen de origen
     * $targetWidth - Ancho de la región de destino
     * $targetHeight - Alto de la región de destino
     * $width - Ancho de la región de origen
     * $height - Altura de la región de origen
     * Copia toda la imagen de origen $sourceImage a la imagen de destino $targetImage
     * empezando desde la esquina superior izquierda de ambas imágenes y redimensionándola al nuevo tamaño $targetWidth y $targetHeight
     */
    imagecopyresampled($targetImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    //dependiendo del tipo de la imagen original, guarda la nueva imagen redimensionada en el formato correspondiente
    switch ($type) {
        case IMAGETYPE_JPEG:
            //crea una imagen jpeg a partir de una imagen en memoria
            //$targetImage es la imagen que quieres guardar
            //$targetPath es la ruta y el nombre de archivo donde se guardará la imagen
            //90 representa la calidad de la imagen en una escala de 0 a 100
            //el valor por defecto es 75
            imagejpeg($targetImage, $targetPath, 90);
            break;
        case IMAGETYPE_PNG:
            //9 es el mayor nivel de compresión en una escala de 0 a 9
            //el formato png no pierde calidad al comprimirse
            imagepng($targetImage, $targetPath, 9);
            break;
        case IMAGETYPE_GIF:
            imagegif($targetImage, $targetPath);
            break;
    }

    //libera la memoria utilizada por las imágenes temporales
    imagedestroy($sourceImage);
    imagedestroy($targetImage);
}

// Procesar la subida del archivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $file = $_FILES['imagen'];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error al subir el archivo.");
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        die("El archivo es demasiado grande. Máximo 1MB permitido.");
    }

    if (!esImagenValida($file['tmp_name'])) {
        die("El archivo no es una imagen válida.");
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $nombreArchivo = 'image_' . date('YmdHis') . '.' . $extension;
    $rutaDestino = UPLOAD_DIR . $nombreArchivo;

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    redimensionarImagen($file['tmp_name'], $rutaDestino, TARGET_WIDTH);

    echo "Imagen subida y procesada con éxito: " . $nombreArchivo;
} else {
    // Formulario HTML para subir la imagen
    echo '
    <h1>Subir archivos</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" accept="image/*" required>
        <input type="submit" value="Subir imagen">
    </form>
    ';
}


/**
 * Configuración en php.ini
* ; Maximum size of POST data that PHP will accept.
* ; Its value may be 0 to disable the limit. It is ignored if POST data reading
* ; is disabled through enable_post_data_reading.
* ; http://php.net/post-max-size
* post_max_size=40M
* ; Maximum allowed size for uploaded files.
* ; http://php.net/upload-max-filesize
* upload_max_filesize=40M

* ; Maximum number of files that can be uploaded via a single request
* max_file_uploads=20


* ; Defines the default timezone used by the date functions
* ; http://php.net/date.timezone
* ;date.timezone =
 */
?>