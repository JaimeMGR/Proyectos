<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen"/>
    <title></title>
</head>
<style>
    .formato td:nth-child(1){
    color:white;
    background-color: purple;
}

.formato td:nth-child(2){
    background-color: rgb(132,93,132);
}
</style>
<body>
    <?php
        $X=7;
        $Y= 8;
        $Z= 10;

        $operaciones=[$X,$Y,$Z,$X+$Y,$Y*$Z,$X/$Z,$X+$Y+$Z,($Y+$Z)/$X];
    ?>

    <table class="formato" border="1">
        <tr>
            <td>Posicion 1</td>
            <td><?php echo $operaciones[0]?></td>
        </tr>
        <tr>
             <td>Posicion 2</td>
            <td><?php echo $operaciones[1]?></td>
        </tr>
        <tr>
            <td>Posicion 3</td>
            <td><?php echo $operaciones[2]?></td>
        </tr>
        <tr>
            <td>Posicion 4</td>
            <td><?php echo $operaciones[3]?></td>
        </tr>

    </table>
</body>
</html>