<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$mascotas = array(
    array(
        "Nombre" => "Luna",
        "Familia" => "Perro",
        "Raza" => "Golden Retriever",
        "Color" => "Dorado",
        "Peso" => "30 kg",
        "Altura" => "60 cm",
        "Edad" => "5 años"
    ),
    array(
        "Nombre" => "Max",
        "Familia" => "Perro",
        "Raza" => "Bulldog",
        "Color" => "Blanco",
        "Peso" => "25 kg",
        "Altura" => "40 cm",
        "Edad" => "3 años"
    ),
    array(
        "Nombre" => "Rocky",
        "Familia" => "Perro",
        "Raza" => "Pastor Alemán",
        "Color" => "Negro y marrón",
        "Peso" => "35 kg",
        "Altura" => "65 cm",
        "Edad" => "6 años"
    )
);
?>

<table>
    <tr>
        <th>Nombre</th>
        <th>Familia</th>
        <th>Raza</th>
        <th>Color</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Edad</th>
    </tr>
    <?php
    // Mostrar los datos de cada perro en la tabla
    foreach ($mascotas as $mascota) {
        echo "<tr>";
        foreach ($mascota as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>