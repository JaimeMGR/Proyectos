<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class FileExcel
{
    private $err = false;
    private $arrayexcel = array();

    public function __construct($path)
    {
        try {
            $spreadsheet = IOFactory::load($path);
            $hoja = $spreadsheet->getActiveSheet();
            $this->arrayexcel = $hoja->toArray();
        } catch (\Throwable $th) {
            $this->err = true;
        }
    }

    public function isError()
    {
        return $this->err;
    }

    public function getData()
    {
        $columnasSeleccionadas = [0, 1, 4, 5, 6];
    
        $datos = [];
    
        // Saltar la primera fila
        array_shift($this->arrayexcel);
    
        foreach ($this->arrayexcel as $fila) {
            $datosFila = [];
            foreach ($columnasSeleccionadas as $columna) {
                $datosFila[] = $fila[$columna];
            }
            $datos[] = $datosFila;
        }
    
        return $datos;
    }
    
}

// Manejar la solicitud POST y procesar los archivos excel
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar los archivos excel
    $resultadoArray = array();

    foreach ($_FILES as $nombreArchivo => $archivo) {
        if ($archivo['error'] === UPLOAD_ERR_OK) {
            $fileExcel = new FileExcel($archivo['tmp_name']);
            if (!$fileExcel->isError()) {
                $datos = $fileExcel->getData();
                // Agregar los datos al resultado array
                $resultadoArray[$nombreArchivo] = $datos;
            }
        }
    }

    // Devolver el resultado array en formato JSON
    header('Content-Type: application/json');
    echo json_encode($resultadoArray);
}
?>
