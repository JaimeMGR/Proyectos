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
    
    $frutas=array("Manzana"=>30,"Peras"=>40,"Platano"=>14);



    echo filtrar($frutas,25);

    echo doble(6)."<br>";

    echo cuenta_atras(5);
    ?>
</body>
</html>