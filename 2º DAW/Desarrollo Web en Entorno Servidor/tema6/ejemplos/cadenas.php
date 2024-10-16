<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cadena="Saludos";

        echo "Tamaño de la cadena: ".strlen($cadena)."<br>";
        echo "En la posicion 3 hay: ".$cadena[3]."<br>";

        $frase="¿A quien no le va a gustar?";
        echo "Busqueda:".strstr($frase,"a")."<br>";
        echo "Busqueda:".strstr($frase,"pe")."<br>";

        echo "Busqueda:".strpos($frase,"a")."<br>";
        echo "Busqueda:".strpos($frase,"a")."<br>";

        $cadena1="Saludos";
        $cadena2="Tractor";
        echo "Comparación:" .strcmp($cadena1,$cadena2)."<br>";
        echo "Comparación:" .strcmp($cadena2,$cadena1)."<br>";

        $fecha1="2024-10-10";
        $fecha2="2024-10-09";
        echo "Comparación:" .strcmp($fecha1,$fecha2)."<br>";

        $palabra="Casablanca";

        $nueva_cadena=str_replace("a","o",$palabra);
        echo "Sistitución $palabra -> $nueva_cadena<br>";

        $frase2="Este es un gran pais";
        $nueva_frase=str_replace("pais","paisaje",$frase2)."<br>";
        echo "Sistitución $frase2 -> $nueva_frase<br>";

        $frase="Mañana hay huelga y no viene nadie a clase";
        echo "Modificar el base<b> ".strtolower($frase)."</br>";
        echo "Modificar el base<b> ".strtoupper($frase)."</br>";
        echo "Modificar el base<b> ".ucfirst($frase)."</br>";
        echo "Modificar el base<b> ".ucwords($frase)."</br>";

        echo "$fecha1"; //2024-10-10
        $año=strtok($fecha1,"-");
        $mes=strtok("-");
        $dia=strtok("-");
        echo "dia $dia mes $mes año $año<br>";

        echo"<br>";
        echo "dia $dia mes $mes año $año";

        $trozos=explode("-",$fecha1);

        echo "año $trozos[0] mes $trozos[1] dia $trozos[2]";

        $fecha_otra
    ?>
</body>
</html>