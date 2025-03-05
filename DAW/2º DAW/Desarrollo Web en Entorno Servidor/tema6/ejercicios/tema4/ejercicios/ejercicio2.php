<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alumnos = array(
        array("nombre" => "Antonio",
        "Matemáticas"=> "5",
        "Lengua"=> "8.3",
        "Ciencias Naturales" => "9",
        "Geografía" => "7",
        ),
        array("nombre" => "Ana",
        "Matemáticas"=> "8",
        "Lengua"=> "7",
        "Ciencias Naturales" => "4.5",
        "Geografía" => "9",
        ),
        array("nombre" => "Benito",
        "Matemáticas"=> "9",
        "Lengua"=> "6.75",
        "Ciencias Naturales" => "9",
        "Geografía" => "3.1",
        )
    );
    ?>
    <table border="1">
    <tr>
        <th class="Encabezado">Alumno</th>
        <th class="Encabezado">Matemáticas</th>
        <th class="Encabezado">Lengua</th>
        <th class="Encabezado">Ciencias Naturales</th>
        <th class="Encabezado">Geografía</th>
        <th class="Encabezado">Media</th>

    </tr>
<?php
    foreach ($alumnos as $alumno) {
    // Sumar las notas
    $totalNotas = $alumno["Matemáticas"] + $alumno["Lengua"] + $alumno["Ciencias Naturales"] + $alumno["Geografía"];
    
    // Calcular la media
    $media = $totalNotas / 4;
    
    echo "<tr class='contenido'>";
    foreach ($alumno as $valor) {
        echo "<td>$valor</td>";
    }
    echo"<td>$media</td>";
    echo "</tr>";
}
        // Mostrar los datos de cada perro en la tabla

?>
</body>
</html>