<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once "funciones.php";

$boletín_notas = array(
    array("nombre" => "Antonio",
    "apellidos" => "Ruiz",
    "nota1"=> "5",
    "nota2"=> "8.5",
    "nota3" => "9"
    ),
    array("nombre" => "Jaime",
    "apellidos" => "Molina",
    "nota1"=> "10",
    "nota2"=> "8",
    "nota3" => "9"
    ),
    array("nombre" => "Jesús",
    "apellidos" => "Arrabal",
    "nota1"=> "5",
    "nota2"=> "4.3",
    "nota3" => "6"
    ),
);
tablanotas($boletín_notas);

?>
</body>
</html>