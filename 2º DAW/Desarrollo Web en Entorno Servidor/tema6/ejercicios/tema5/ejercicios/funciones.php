<<<<<<< Updated upstream
<?php
 function filtrar($array,$minimo){
    $resultado="";
    foreach($array as $clave => $valor){
        if($valor >= $minimo){
        $resultado.="<p>$clave</p>";
        }
    }
    return $resultado;
}

function doble($numero){
    return $numero*2;
}

function cuenta_atras($longitud){
    $resultado = "";
    for($i=$longitud;$i>0;$i--){
        $resultado.="$i<br>";
    }
    $resultado.="<h1>Boom</h1>";

    return $resultado;
}

function randomColor(){
    $str = "#";
    for($i = 0 ; $i < 6 ; $i++){
    $randNum = rand(0, 15);
    switch ($randNum) {
    case 10: $randNum = "A"; 
    break;
    case 11: $randNum = "B"; 
    break;
    case 12: $randNum = "C"; 
    break;
    case 13: $randNum = "D"; 
    break;
    case 14: $randNum = "E"; 
    break;
    case 15: $randNum = "F"; 
    break; 
    }
    $str .= $randNum;
    }
    return $str;
   }

   $color1=randomColor();
   $color2=randomColor();
   $color3=randomColor();
   
   function tablarandom($color1, $color2, $color3){
    echo "<table border='2'>";
    echo "<tr>";
    echo "<td style='background-color:$color1'>color1</td>";
    echo "<td style='background-color:$color2'>color2</td>";
    echo "<td style='background-color:$color3'>color3</td>";
    echo "</tr>";
    echo "</table>";
}

    function tablarandom2($class1, $class2, $class3){
        echo "<table border='2'>";
        echo "<tr class='$class1'>";
        echo "<td>color1</td>";
        echo "</tr>";
        echo "<tr class='$class2'>";
        echo "<td>color2</td>";
        echo "</tr>";
        echo "<tr class='$class3'>";
        echo "<td>color3</td>";
        echo "</tr>";
        echo "</table>";
    }

    function tablanotas($array){
        foreach ($array as $alumno) {
            // Sumar las notas
            $totalNotas = $alumno["nota1"] + $alumno["nota2"] + $alumno["nota3"];
            
            // Calcular la media
            $media = $totalNotas / 3;
            echo"<table border=1>
            <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>nota1</th>
                    <th>nota2</th>
                    <th>nota3</th>
                    <th>nota media</th>
                </tr>
            <tr class='contenido'>";
            foreach ($alumno as $valor) {
                echo "<td>$valor</td>";
            }
            echo"<td>$media</td>
            </tr>
            </table>
            <br>";
        }
    }
=======
<?php
 function filtrar($array,$minimo){
    $resultado="";
    foreach($array as $clave => $valor){
        if($valor >= $minimo){
        $resultado.="<p>$clave</p>";
        }
    }
    return $resultado;
}

function doble($numero){
    return $numero*2;
}

function cuenta_atras($longitud){
    $resultado = "";
    for($i=$longitud;$i>0;$i--){
        $resultado.="$i<br>";
    }
    $resultado.="<h1>Boom</h1>";

    return $resultado;
}

function randomColor(){
    $str = "#";
    for($i = 0 ; $i < 6 ; $i++){
    $randNum = rand(0, 15);
    switch ($randNum) {
    case 10: $randNum = "A"; 
    break;
    case 11: $randNum = "B"; 
    break;
    case 12: $randNum = "C"; 
    break;
    case 13: $randNum = "D"; 
    break;
    case 14: $randNum = "E"; 
    break;
    case 15: $randNum = "F"; 
    break; 
    }
    $str .= $randNum;
    }
    return $str;
   }

   $color1=randomColor();
   $color2=randomColor();
   $color3=randomColor();
   
   function tablarandom($color1, $color2, $color3){
    echo "<table border='2'>";
    echo "<tr>";
    echo "<td style='background-color:$color1'>color1</td>";
    echo "<td style='background-color:$color2'>color2</td>";
    echo "<td style='background-color:$color3'>color3</td>";
    echo "</tr>";
    echo "</table>";
}

    function tablarandom2($class1, $class2, $class3){
        echo "<table border='2'>";
        echo "<tr class='$class1'>";
        echo "<td>color1</td>";
        echo "</tr>";
        echo "<tr class='$class2'>";
        echo "<td>color2</td>";
        echo "</tr>";
        echo "<tr class='$class3'>";
        echo "<td>color3</td>";
        echo "</tr>";
        echo "</table>";
    }

    function tablanotas($array){
        foreach ($array as $alumno) {
            // Sumar las notas
            $totalNotas = $alumno["nota1"] + $alumno["nota2"] + $alumno["nota3"];
            
            // Calcular la media
            $media = $totalNotas / 3;
            echo"<table border=1>
            <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>nota1</th>
                    <th>nota2</th>
                    <th>nota3</th>
                    <th>nota media</th>
                </tr>
            <tr class='contenido'>";
            foreach ($alumno as $valor) {
                echo "<td>$valor</td>";
            }
            echo"<td>$media</td>
            </tr>
            </table>
            <br>";
        }
    }
>>>>>>> Stashed changes
?>