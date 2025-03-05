<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $kilometros=1000;
    $combustible=70;

    $consumo_medio=$combustible/$kilometros;

    echo "Para $kilometros kilometros hemos necesitado $combustible litros, eso nos da una media de $consumo_medio litros por kilómetro";
    ?>
</body>
</html>