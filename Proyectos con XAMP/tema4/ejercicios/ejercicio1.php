<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ciudad = array(
        "Granada" => "150000",
        "Madrid" => "3000000",
        "Barcelona" => "3000000",
        "Málaga" => "240000",
        "Sevilla" => "500000",
        "Valencia" => "1584600",
        "Tarragona" => "485210");

        asort($ciudad);
        ?>
        <table border=1>
        <tr>
            <th>Ciudad</th>
            <th>Poblacion</th>
        </tr>
        <tr>
        <?php

foreach($ciudad as $ciudades=>$poblacion){
    echo "<tr>";
    echo "<td>$ciudades</td>";
    echo "<td>$poblacion</td>";
    echo "</tr>";
}
        ?>
</body>
</html>