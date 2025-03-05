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

    public function readFile(){
        
    }
    public function getnumbersArray($datos900, $datos901, $datos902){
// Verifica si $datos901 no está vacío
if (!empty($datos900)) {
    // Itera sobre los datos del archivo $datos900
    foreach ($datos900 as $row) {
        // Agrega cada número de teléfono del archivo a $arraysArchivo
        $arraysArchivo[] = $row[1]; // Suponiendo que el número de teléfono está en la posición 1 del array $row
    
    }}else if (!empty($datos901)) {
    // Itera sobre los datos del archivo $datos901
    foreach ($datos901 as $row) {
        // Agrega cada número de teléfono del archivo a $arraysArchivo
        $arraysArchivo[] = $row[1]; // Suponiendo que el número de teléfono está en la posición 1 del array $row
    
    }}else if (!empty($datos902)) {
    // Itera sobre los datos del archivo $datos902
    foreach ($datos902 as $row) {
        // Agrega cada número de teléfono del archivo a $arraysArchivo
        $arraysArchivo[] = $row[1]; // Suponiendo que el número de teléfono está en la posición 1 del array $row
    }
    }
    }
    
}

?>
