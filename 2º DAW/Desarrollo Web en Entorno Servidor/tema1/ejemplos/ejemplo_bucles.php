<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // bucle para mostrar numeros del 1 al 10
        $i=1;
        while ($i <= 10) {
            echo "$i <br>";
            $i++;
        }
    // bucle para mostrar una tabla 10 x 10 del 1 al 100
        $contador=1;
        $i=1;
        echo "<table border=1>";
        while($i<=10){
            echo "<tr>";
            $j=1;
            while($j<= 10){
                echo "<td>$contador</td>";
                $j++;
                $contador++;
        }
        echo "</tr>";
        $i++;
        }
        echo"</table>";


        $lista=["perro","gato","Leopardo","Caballo","Dragón", "Unicornio"];
        for ($i=0; $i <count($lista); $i++){
            echo "<td>".$lista[$i]."</br>";
        };




        foreach ($lista as $animal => $value) {
            echo "$animal<br>";
        }

        $libros=["Harry Potter"=>29.99,"El Quijote"=>15.99,"El Hobbit"=>8.95];
        foreach ($libros as $titulo=>$precio) {
            echo "$titulo $precio<br>";
        }
    ?>
</body>
</html>