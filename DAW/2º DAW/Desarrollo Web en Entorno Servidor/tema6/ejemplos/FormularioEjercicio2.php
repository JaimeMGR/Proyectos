<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Respuesta al envio del formulario</h1>
    <?php
        $nombre=$_POST["nombre"];
        $edad=$_POST["edad"];

        if(isset($nombre) && $nombre!="" && $edad!=""){
            if($edad>=0){
                echo "El nombre es $nombre y la edad es $edad años";
            }else{
                echo "Edad incorrecta";
            }
        }else{
            echo "No se han enviado los datos correctamente";
        }
    ?>
</body>
</html>