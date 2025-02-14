<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $numero = $_POST["numero"];
    echo "<h2>Tabla de multiplicar del número $numero</h2>";
    echo "<table border='1'>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        echo "<td>$numero x $i = ".($numero * $i)."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "";
    echo "<a href='ejercicio1.html'>Volver a la página anterior</a>";
    echo "";
    ?>
</body>
</html>