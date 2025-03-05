<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_REQUEST["color"])&&isset($_REQUEST["nombre"])){
            $color=$_REQUEST["color"];
            $nombre=$_REQUEST["nombre"];
        }else{
            die("No has seleccionado un color");
        }



        $color=$_REQUEST["color"];;
        echo "<span style='background-color:$color'>El color elegido ha sido $color</span>";
    ?>
</body>
</html>