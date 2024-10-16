<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosej2.css" media="screen"/>
    <title>Document</title>
</head>
<style>
    .tabla tr:nth-child(1){
    background-color: rgb(0, 0, 0);
    color: white;

}
.tabla tr{
    background-color: rgb(13, 155, 0);
    color: white;

}
.tabla tr:nth-child(even){
    background-color: rgb(46, 124, 0);
    color: white;
}

</style>
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