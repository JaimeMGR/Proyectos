<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Verificar si se han seleccionado frutas
    if (isset($_POST["Frutas"])) {
        $frutas = $_POST["Frutas"];
        echo "Has seleccionado las siguientes frutas:<br>";
        foreach ($frutas as $fruta) {
            echo "$fruta<br>";
        }
    } else {
        echo "No has seleccionado ninguna fruta.";
    }
?>

</body>
</html>