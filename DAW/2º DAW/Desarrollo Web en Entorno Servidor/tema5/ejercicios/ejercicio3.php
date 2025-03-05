<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .class1 {
        background-color: lightblue;
        color: black;
        text-align: center;
    }

    .class2 {
        background-color: lightgreen;
        color: white;
        text-align: center;
    }

    .class3 {
        background-color: lightcoral;
        color: white;
        text-align: center;
    }
</style>
<body>

<?php
    require_once "funciones.php";

    tablarandom2('class1', 'class2', 'class3');
?>
</body>
</html>