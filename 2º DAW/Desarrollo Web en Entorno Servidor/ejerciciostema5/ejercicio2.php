<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    require_once "funciones.php";

    $color1=randomColor();
    $color2=randomColor();
    $color3=randomColor();

    tablarandom($color1, $color2, $color3);
?>
</body>
</html>