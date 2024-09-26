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
        $dia_semana=1;
        $meses=["Enero"=>31,"Febrero"=>28,"Marzo"=>31,"Abril"=>30,"Mayo"=>31,"Junio"=>30,"Julio"=>31,"Agosto"=>31,"Septiembre"=>30,"Octubre"=>31,"Noviembre"=>30,"Diciembre"=>31];

        foreach($meses as $nombre=>$dias_mes){
           
            echo "<h1>$nombre</h1>";
            echo "<table border=1>";
            echo"<tr>";
            // dias de la semana
            foreach($semana as $dia){
                echo "<th>".$dia."</th>";
            }
            // ajustar las casillas al dia de la semana
            echo "</tr><tr>";
            while($i!=$dia_semana){
                echo"<td></td>";
                $i++;
            }
            $i=1;
            // mostrar dias
            while ($i <= $dias_mes) {
            echo "<td>$i </td>";
            $i++;
            // bajar a la siguiente linea despues del domingo
            if ($dia_semana==7){
                echo "</tr><tr>";
                $dia_semana=1;
            }else{
                $dia_semana++;
            }
             }
               // Actualizar el día de la semana para el próximo mes
         $i=1;
            echo "</table>";
        }
?>
</body>
</html>