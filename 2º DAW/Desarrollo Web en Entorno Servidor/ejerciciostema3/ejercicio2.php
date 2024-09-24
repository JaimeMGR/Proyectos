<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosej2.css" media="screen"/>
    <title>Document</title>
</head>
<body>
<?php
        $numeros=[3,8,7,-6];
    ?>

    <table class="tabla">
            <td>Número</td>
            <td>Cuadrado</td>
            <td>Cubo</td>
        <tr>

       <?php // Mostrar los datos de cada perro en la tabla
    foreach ($numeros as $numero) {
        echo "<tr>";
            echo "<td> $numero</td>";
            echo "<td>".$numero*$numero."</td>";
            echo "<td>".$numero*$numero*$numero."</td>";
        }
        echo "</tr>";
    
    ?>
    </table>
</body>
</html>