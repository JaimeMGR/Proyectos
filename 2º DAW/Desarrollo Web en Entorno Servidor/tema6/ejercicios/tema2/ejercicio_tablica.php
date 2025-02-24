<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosejerciciotabla.css" media="screen"/>

    <title>Document</title>
</head>
<style>
.contenido:nth-child(even){
    background: rgb(255, 172, 186);
    color: white;
}

.Encabezado{
    background: rgb(255, 103, 128);
    color: white;
}
</style>
<body>
    <?php
$posicion = array(
    array("palabra1" => "coche",
    "valor"=> "5000",
    ),
    array(
        "palabra2" => "moto",
        "valor"=> "3000"
    ),
    array(
        "palabra3" => "tractor",
        "valor"=> "15000",
    ),
    array(
        "palabra4" => "avión",
        "valor"=> "400000",
    )
);
?>

<table>
    <tr>
        <th class="Encabezado">POSICIÓN</th>
        <th class="Encabezado">VALOR</th>
    </tr>
    <?php
    // Mostrar los datos de cada perro en la tabla
    foreach ($posicion as $posicion) {
        echo "<tr class='contenido'>";
        foreach ($posicion as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    ?>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosejerciciotabla.css" media="screen"/>

    <title>Document</title>
</head>
<style>
.contenido:nth-child(even){
    background: rgb(255, 172, 186);
    color: white;
}

.Encabezado{
    background: rgb(255, 103, 128);
    color: white;
}
</style>
<body>
    <?php
$posicion = array(
    array("palabra1" => "coche",
    "valor"=> "5000",
    ),
    array(
        "palabra2" => "moto",
        "valor"=> "3000"
    ),
    array(
        "palabra3" => "tractor",
        "valor"=> "15000",
    ),
    array(
        "palabra4" => "avión",
        "valor"=> "400000",
    )
);
?>

<table>
    <tr>
        <th class="Encabezado">POSICIÓN</th>
        <th class="Encabezado">VALOR</th>
    </tr>
    <?php
    // Mostrar los datos de cada perro en la tabla
    foreach ($posicion as $posicion) {
        echo "<tr class='contenido'>";
        foreach ($posicion as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    ?>
</body>
>>>>>>> Stashed changes
</html>