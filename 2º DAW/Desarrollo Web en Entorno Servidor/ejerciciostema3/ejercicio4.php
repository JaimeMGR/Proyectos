<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $semana=["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"];
        $año=2024;
        $i=1;
        $primerDiaSemana =0;
        $meses=["Enero"=>31,"Febrero"=>28,"Marzo"=>31,"Abril"=>30,"Mayo"=>31,"Junio"=>30,"Julio"=>31,"Agosto"=>31,"Septiembre"=>30,"Octubre"=>31,"Noviembre"=>30,"Diciembre"=>31];

        foreach($meses as $nombre=>$dias_mes){
            echo "<h1>$nombre</h1>";

            echo "<table border=1>";
            echo"<tr>";
            foreach($semana as $dia){
                echo "<td>".$dia."</td>";
            }
            echo "</tr>";
            while ($i <= $dias_mes) {
                switch ($i){
                    case $i==1:
                        echo "<tr>";
                    case $i==8:
                        echo "<tr>";
                    case $i==15:
                        echo "<tr>";
                    case $i==22:
                        echo "<tr>";
                    }
       // Añadir celdas vacías si el mes no termina en domingo
    while (($i + $primerDiaSemana - 1) % 7 != 0) {
        echo "<td></td>";
        $dia++;
    }
                echo "<td>$i </td>";
                switch ($i){
                    case $i==7:
                        echo "</tr>";
                    case $i==14:
                        echo "</tr>";
                    case $i==21:
                        echo "</tr>";
                    case $i==28:
                        echo "</tr>";
                    }
                $i++;
             }
               // Actualizar el día de la semana para el próximo mes
             $primerDiaSemana = ($primerDiaSemana + $dia_mes) % 7;
         $i=1;
            echo "</table>";
        }
?>
</body>
</html>