<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosej3.css" media="screen"/>
    <title></title>
</head>
<body>
    <?php
    $notas=array("Juan"=>8,"Lucia"=>4,"Jose Pablo"=>6,"Jaime"=>10,"Rubencio"=>8,"David"=>10,"Enrique"=>7);
?>
    <table class="formato" border="1">
            <td>Alumno</td>
            <td>Nota</td>
            <td>Estado</td>
            <?php
            foreach ($notas as $nombre=>$nota) {
        echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$nota</td>";
              switch($nota){
            case $nota<5:
                echo "<td>Suspenso</td>";
                break;
            case $nota==5:
                echo "<td>Aprobado</td>";
                break;
            case $nota==6:
                echo "<td>Bien</td>";
                break;
            case $nota>=7 && $nota<=8:
                echo "<td>Notable</td>";
                break;
            case $nota==9:
                echo "<td>Sobresaliente</td>";
                break;
            case $nota==10:
                echo "<td>Matrícula de honor</td>";
                break;
            }
        }
        echo "</tr>";
        ?>
    </table>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosej3.css" media="screen"/>
    <title></title>
</head>
<body>
    <?php
    $notas=array("Juan"=>8,"Lucia"=>4,"Jose Pablo"=>6,"Jaime"=>10,"Rubencio"=>8,"David"=>10,"Enrique"=>7);
?>
    <table class="formato" border="1">
            <td>Alumno</td>
            <td>Nota</td>
            <td>Estado</td>
            <?php
            foreach ($notas as $nombre=>$nota) {
        echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$nota</td>";
              switch($nota){
            case $nota<5:
                echo "<td>Suspenso</td>";
                break;
            case $nota==5:
                echo "<td>Aprobado</td>";
                break;
            case $nota==6:
                echo "<td>Bien</td>";
                break;
            case $nota>=7 && $nota<=8:
                echo "<td>Notable</td>";
                break;
            case $nota==9:
                echo "<td>Sobresaliente</td>";
                break;
            case $nota==10:
                echo "<td>Matrícula de honor</td>";
                break;
            }
        }
        echo "</tr>";
        ?>
    </table>
</body>
>>>>>>> Stashed changes
</html>