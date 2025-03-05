<?php
/* Copyright (C) 2001-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2015      Jean-François Ferry	<jfefe@aternatik.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       oyrfreepbx/oyrfreepbxindex.php
 *	\ingroup    oyrfreepbx
 *	\brief      Home page of oyrfreepbx top menu
 */

// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) {
    $res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/main.inc.php";
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = realpath(__FILE__);
$i = strlen($tmp) - 1;
$j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
    $i--;
    $j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1)) . "/main.inc.php")) {
    $res = @include substr($tmp, 0, ($i + 1)) . "/main.inc.php";
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1))) . "/main.inc.php")) {
    $res = @include dirname(substr($tmp, 0, ($i + 1))) . "/main.inc.php";
}
// Try main.inc.php using relative path
if (!$res && file_exists("../main.inc.php")) {
    $res = @include "../main.inc.php";
}
if (!$res && file_exists("../../main.inc.php")) {
    $res = @include "../../main.inc.php";
}
if (!$res && file_exists("../../../main.inc.php")) {
    $res = @include "../../../main.inc.php";
}
if (!$res) {
    die("Include of main fails");
}

require_once("../db/querys.class.php");
require_once("../facture/CreateFacture.class.php");
require ('../file/FileExcel.class.php');
require ('CallProcess.php');

$socid = GETPOST('socid', 'int');
$year = GETPOST('year', 'int');
$month = GETPOST('month', 'int');



if ($socid != "" && $month != "" && $year != "") {
    
    $query = new Query($db);
    $numbers = $query->getNumber($socid);    
    // Obtener todos los usuarios
    $users = $query->getUsers('');
    // echo ("id de socio:  $socid");
    // echo (" mes actual: $month");
    // echo (" Año actual : $year ");
    // var_dump($query);
     $arrayData = array();
    // var_dump($arrayData);
    
    //  var_dump($_FILES);
 
    for ($i = 0; $i < count($numbers); $i++) {

        array_push($arrayData, array($numbers[$i]["voip"], $query->getDataFreepbx($numbers[$i]["voip"], $year, $month)));
    }

    $arrayfileData=array();
    $files=array_values($_FILES);
    for ($i=0; $i < count($files) ; $i++) { 
        if($files[$i]["name"]!=""){
        $fileExcel = new FileExcel($files[$i]['tmp_name']);
           if (!$fileExcel->isError()) {
            //listado de numero de telefonos  que tienen un numero 900 y su tiempo 
                    array_push($arrayfileData,$fileExcel->getData());
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Error al procesar el archivo']);
                exit();
            }
        }
    }





    /* 
    compares los numeros 900
    con los numeros asociados al cliente 

    cuando coincidan los guardas en una array con la duracion de ese numero

    puedo llamar a la funcion getServices del objeto Querys 
    $query->getServices()
    */
    //inicio  
// Inicializa $arrayfileData como un arreglo vacío antes de usarlo
$arraynumber = array();


    $arrayNumeros = $query->getNumber($socid);
    echo"<br><br>";

    for ($i=0; $i <count($arrayNumeros) ; $i++) { 
    $serviceExplode=explode(',', $arrayNumeros[$i]["voip"]);
    for ($a=0; $a < count($serviceExplode) ; $a++) { 
        array_push($arraynumber,$serviceExplode[$a]);      
    }
    }
    var_dump( $arraynumber);
    //fin 


    /* 
    obtener los servicios asociados a este tercero y meterlos en un array 
    
    */
//inicio 
$arrayService = array();


    $arrayServicios = $query->getServices($socid);

    for ($i=0; $i <count($arrayServicios) ; $i++) { 
    $serviceExplode=explode(',', $arrayServicios[$i]["servicioref"]);
    for ($a=0; $a < count($serviceExplode) ; $a++) { 
        array_push($arrayService,$serviceExplode[$a]);      
    }
    }
    echo"<br><br>";
    var_dump( $arrayService);
    echo"<br><br>";

    //fin 

 // Define los arrays de números a buscar y del archivo
 // Contendrá todos los números de teléfono de los usuarios

// Itera sobre cada usuario y obtén sus números de teléfono

// Encuentra los números que están presentes en ambos arrays

// echo "Números a buscar";
// var_dump($arraysBuscar);
// echo "<br><br>";
// echo "Números del archivo";
// var_dump($arraysArchivo);
// echo "<br><br>";


  //numeros de telefono asociado al cliente 
  $arraysBuscar = $query->getNumber($socid);

  $numerosBuscar = array();
  foreach ($arraysBuscar as $item) {
      $numeros = explode(',', $item['voip']);
      $numerosBuscar = array_merge($numerosBuscar, $numeros);
  }
  

  $Numerosarchivo = array();

  foreach ($arrayfileData as $fileData) {
      // Recorrer cada fila del archivo
      foreach ($fileData as $row) {
          // Verificar si la segunda columna existe en esta fila
          if (isset($row[1])) { // Recordando que los índices comienzan desde 0
              // Agregar el dato de la segunda columna al arreglo $columna2Data
              $Numerosarchivo[] = $row[1];
          }
      }
  }
  
  // $columna2Data ahora contiene todos los datos de la segunda columna de todos los archivos procesados
  
//   VAR_DUMP($Numerosarchivo);


  $Duracionarchivo = array();


  foreach ($arrayfileData as $fileData) {
      // Recorrer cada fila del archivo
      foreach ($fileData as $row) {
          // Verificar si la segunda columna existe en esta fila
          if (isset($row[2])) { // Recordando que los índices comienzan desde 0
              // Agregar el dato de la segunda columna al arreglo $columna2Data
              $Duracionarchivo[] = $row[3];
          }
      }
  }

$precios1 = $query->getPrice("Llamadas900");
$precios2 = $query->getPrice("Llamadas901");
$precios3 = $query->getPrice("Llamadas902");





// Verificamos que $precios no esté vacío y tiene al menos un resultado
if (!empty($precios1) && is_array($precios1)) {
    // Supongamos que queremos obtener el primer precio del array
    $PrecioString1 = $precios1[0]['price']; // Suponiendo que 'price' es el nombre del campo en la base de datos

    // Convertimos el string a un número decimal (float)
    $PrecioDecimal1 = floatval($PrecioString1);
} else if (!empty($precios2) && is_array($precios2)) {
    // Supongamos que queremos obtener el primer precio del array
    $PrecioString2 = $precios2[0]['price']; // Suponiendo que 'price' es el nombre del campo en la base de datos

    // Convertimos el string a un número decimal (float)
    $PrecioDecimal2 = floatval($PrecioString2);
}else if (!empty($precios3) && is_array($precios3)) {
    // Supongamos que queremos obtener el primer precio del array
    $PrecioString3 = $precios3[0]['price']; // Suponiendo que 'price' es el nombre del campo en la base de datos

    // Convertimos el string a un número decimal (float)
    $PrecioDecimal3 = floatval($PrecioString3);
}

$llamadasConCosto = array(); // Array compuesto para almacenar el valor de usuario y tiempo de cada llamada
    //crear la factura 
$facture = new CreateFacture($db, $socid, $user, $year, $month);
// var_dump($facture);

$llamadasConCosto = array(); // Array para almacenar las llamadas con costos

// Llamadas para procesar según el tipo de precios
if (!empty($precios1)) {
    $datos = new CallProcess($arrayfileData, $numerosBuscar, $facture, 'precios1');
} elseif (!empty($precios2)) {
    $datos = new CallProcess($arrayfileData, $numerosBuscar, $facture, 'precios2');
} elseif (!empty($precios3)) {
    $datos = new CallProcess($arrayfileData, $numerosBuscar, $facture, 'precios3');
}

echo"<br><br>";
var_dump($datos);




    //crear el pdf
    setEventMessages("Se ha creado la factura con ref " . $facture->getRefFacture(), null, 'mesgs');
} else {
    setEventMessages("No se han mandado los datos correctos", null, 'errors');
}
