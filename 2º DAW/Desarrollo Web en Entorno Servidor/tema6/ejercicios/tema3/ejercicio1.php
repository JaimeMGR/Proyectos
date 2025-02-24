<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosej1.css" media="screen"/>
    <title></title>
</head>
<style>
    .tabla tr{
    background-color: rgb(255, 167, 167);
    border: 1;
}
.tabla tr:nth-child(even){
    background-color: rgb(253, 101, 101);

}


</style>
<body>
    <?php
$numero=0;
$i=1;
$contador=1;
    ?>
        <?php 
        while ($numero!=10) {
            echo "<h1>Tabla de multiplicar del $contador</h1>";
            echo "<table class='tabla' border=1>";

            if($numero<=10){
                $numero++;

                while ($i <= 10) {
                    $cuenta=$numero*$i;
                    echo "<tr><td>$numero x $i</td>";
                    echo"<td> $cuenta </td></tr>";
                    $i++; 
                }
                $i=0;
                $contador++;
    }
        echo "</table>";
    }
        ?>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosej1.css" media="screen"/>
    <title></title>
</head>
<style>
    .tabla tr{
    background-color: rgb(255, 167, 167);
    border: 1;
}
.tabla tr:nth-child(even){
    background-color: rgb(253, 101, 101);

}


</style>
<body>
    <?php
$numero=0;
$i=1;
$contador=1;
    ?>
        <?php 
        while ($numero!=10) {
            echo "<h1>Tabla de multiplicar del $contador</h1>";
            echo "<table class='tabla' border=1>";

            if($numero<=10){
                $numero++;

                while ($i <= 10) {
                    $cuenta=$numero*$i;
                    echo "<tr><td>$numero x $i</td>";
                    echo"<td> $cuenta </td></tr>";
                    $i++; 
                }
                $i=0;
                $contador++;
    }
        echo "</table>";
    }
        ?>
</body>
>>>>>>> Stashed changes
</html>