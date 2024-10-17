<?php
require '../file/FileExcel.class.php';


if (isset($_FILES['file']) && !empty($_FILES['file']['tmp_name'])) {
    $file = $_FILES['file'];
    $fileExcel = new FileExcel($file['tmp_name']);

    if (!$fileExcel->isError()) {
        $datos = $fileExcel->getData();
        var_dump($datos);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Error al procesar el archivo']);
    }
}