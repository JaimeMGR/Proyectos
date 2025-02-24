<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // if(checkdate(10, 14, 2024)){
        //     echo "La fecha es válida<br>";
        // }else{
        //     echo "La fecha no es válida<br>";
        // }
 
        // if(checkdate(13, 14, 2024)){
        //     echo "La fecha es válida<br>";
        // }else{
        //     echo "La fecha no es válida<br>";
        // }
 
        // $fecha= date("d-m-Y H:i:s");
 
        // echo "Fecha y hora actual: $fecha<br>";
 
        // $fecha=getdate();
 
        // echo "Fecha ".$fecha["mday"]."-".$fecha["month"]."-".$fecha["year"]."<br>";
        // echo "Hora ".$fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"]."<br>";
 
 
        $actual=time();
        $marcatiempo=mktime(22,30,12,12,24,2025);
        echo "Actual $actual<br>";
        echo "Futuro $marcatiempo<br>";
 
        $formateada=date("Y-m-d H:i:s", $marcatiempo);
        echo "Fecha formateada: $formateada<br>";
 
 
        $otramarca=strtotime("2025-12-24");
 
        echo "$otramarca<br>";
 
        $formateada=date("Y-m-d H:i:s", $marcatiempo);
 
        echo "$formateada<br>";
 
 
        $marcatiempo+=24*3600;
        $formateada=date("Y-m-d H:i:s", $marcatiempo);
 
        echo "$formateada<br>";
 
 
        $futuro = strtotime("+3 days", $marcatiempo);
 
        echo "$futuro<br>";
 
 
 
     $formateada=date("Y-m-d H:i:s", $futuro);
 
        echo "$formateada<br>";
 
 
       
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // if(checkdate(10, 14, 2024)){
        //     echo "La fecha es válida<br>";
        // }else{
        //     echo "La fecha no es válida<br>";
        // }
 
        // if(checkdate(13, 14, 2024)){
        //     echo "La fecha es válida<br>";
        // }else{
        //     echo "La fecha no es válida<br>";
        // }
 
        // $fecha= date("d-m-Y H:i:s");
 
        // echo "Fecha y hora actual: $fecha<br>";
 
        // $fecha=getdate();
 
        // echo "Fecha ".$fecha["mday"]."-".$fecha["month"]."-".$fecha["year"]."<br>";
        // echo "Hora ".$fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"]."<br>";
 
 
        $actual=time();
        $marcatiempo=mktime(22,30,12,12,24,2025);
        echo "Actual $actual<br>";
        echo "Futuro $marcatiempo<br>";
 
        $formateada=date("Y-m-d H:i:s", $marcatiempo);
        echo "Fecha formateada: $formateada<br>";
 
 
        $otramarca=strtotime("2025-12-24");
 
        echo "$otramarca<br>";
 
        $formateada=date("Y-m-d H:i:s", $marcatiempo);
 
        echo "$formateada<br>";
 
 
        $marcatiempo+=24*3600;
        $formateada=date("Y-m-d H:i:s", $marcatiempo);
 
        echo "$formateada<br>";
 
 
        $futuro = strtotime("+3 days", $marcatiempo);
 
        echo "$futuro<br>";
 
 
 
     $formateada=date("Y-m-d H:i:s", $futuro);
 
        echo "$formateada<br>";
 
 
       
>>>>>>> Stashed changes
    ?>