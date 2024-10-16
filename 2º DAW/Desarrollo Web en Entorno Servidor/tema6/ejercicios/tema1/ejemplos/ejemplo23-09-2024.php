<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // definido con la cuncion array
    $numeros=array(90,"perro",45,12);
    // definido con los [] por posicion
    $masnumeros[0]=10;
    $masnumeros[1]=20;
    $masnumeros[2]=30;
    // añadir al final
    $numeros[]="Se añade al final";
    echo $numeros[4];

    // definir un array asociativo
    $notas=array("Juan"=>8,"Lucia"=>4,"Jose Pablo"=>6);
    echo $notas["Lucia"];
    $productos["patatas"]=8.9;
    $productos["Hamburguesa"]= 10;

    $arraynormal=["Camión","Avión","Barco"];
    echo $arraynormal[0];
    $arrayasociativo=["Juan"=>10,"Antonio"=> 7,"Pablo"=> 7,5];
    echo $arrayasociativo["Pablo"]."<br>";

    define("AFORO",27);
    echo AFORO."<br>";
    define("numeros",[9,8,7,6,5]);
    echo numeros[0]."<br>";
    ?>
    
</body>
</html>