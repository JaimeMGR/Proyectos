<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del vehiculo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php

function validarFecha($fecha) {
    $partes = explode("-", $fecha);
    $hoy = date('d-m-Y');
    if ($fecha>$hoy) {
        echo "<h1>Ha ocurrido un error</h1>";
        echo "<div class='mostrarerror'>";
        echo "La fecha de matriculación no puede ser posterior a la actual.<br><br>";
        echo "<button class='volver' onclick='history.back();'>VOLVER</button> ";
        echo "</div>";
        exit();
    }
    return checkdate($partes[1], $partes[2], $partes[0]);

}

//Sacamos los datos del formulario que hemos mandado en la página anterior
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = trim($_POST['tipo']);
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $matricula = trim($_POST['matricula']);
    $fecha = $_POST['fecha'];
    $comentarios = trim($_POST['comentarios']);

    //Convertimos la primera letra a mayúscula
    $marca = ucwords($marca);
    $modelo = ucwords($modelo);
    $matricula = ucwords($matricula);

    //Comprobamos la longitud de los datos
    $longitudMarca = strlen($marca);
    $longitudModelo = strlen($modelo);
    $longitudMatricula = strlen($matricula);

    // Validacion de longitud de la matrícula
    if($longitudMatricula <7){
        echo "<h1>Ha ocurrido un error</h1>";
        echo "<div class='mostrarerror'>";
        echo "La matrícula está incompleta, vuelva a introducirla.<br><br>";
        echo "<button class='volver' onclick='history.back();'>VOLVER</button> ";
        echo "</div>";
        exit();
    }elseif($longitudMatricula >7){
        echo "<h1>Ha ocurrido un error</h1>";
        echo "<div class='mostrarerror'>";
        echo "La matrícula es muy larga, vuelva a introducirla.<br><br>";
        echo "<button class='volver' onclick='history.back();'>VOLVER</button> ";
        echo "</div>";
        exit();
    }

    // Si alguien comenta que tiene un "problema" se cambiará la palabra por "inconveniente"
    if (str_contains($comentarios, 'problema')) {
        $comentarios = ucfirst($comentarios);
        $comentarios = str_replace('problema', 'inconveniente', $comentarios);
    }

    // Validar fecha de matriculación
    if (!validarFecha($fecha)) {
        echo "<h1>Ha ocurrido un error</h1>";
        echo "<div class='mostrarerror'>";
        echo "La fecha de matriculación no es válida, vuelva a introducirla.";
        echo "<button class='volver' onclick='history.back();'>VOLVER</button> ";
        echo "</div>";
        exit();
    }

    // Información detallada de la fecha
    $fechaInfo = getdate(strtotime($fecha));
    $timestamp = mktime(0, 0, 0, $fechaInfo['mon'], $fechaInfo['mday'], $fechaInfo['year']);

    //Cambiar los dias a español
    switch ($fechaInfo['weekday']) {
        case 'Monday':
            $dia="Lunes";
            break;
        case 'Tuesday':
            $dia="Martes";
            break;
        case 'Wednesday':
            $dia="Miércoles";
            break;
        case 'Thursday':
            $dia="Jueves";
            break;
        case 'Friday':
            $dia="Viernes";
            break;
        case 'Saturday':
            $dia="Sábado";
            break;
        case 'Sunday':
            $dia="Domingo";
            break;
    }

    //Cambiar los meses a español
    switch ($fechaInfo['month']) {
        case 'January':
            $mes="Enero";
            break;
        case 'February':
            $mes="Febrero";
            break;
        case 'March':
            $mes="Marzo";
            break;
        case 'April':
            $mes="Abril";
            break;
        case 'May':
            $mes="Mayo";
            break;
        case 'June':
            $mes="Junio";
            break;
        case 'July':
            $mes="Julio";
            break;
        case 'August':
            $mes="Agosto";
            break;
        case 'September':
            $mes="Septiembre";
            break;
        case 'October':
            $mes="Octubre";
            break;
        case 'November':
            $mes="Noviembre";
            break;
        case 'December':
            $mes="Diciembre";
            break;
    }


    // Mostrar resultados
    echo "<h1>Datos del coche:</h1>";
    echo "<div class='datos'>";
    echo "Tipo de vehículo: $tipo<br>";
    echo "Marca: $marca (Longitud: $longitudMarca carácteres)<br>";
    echo "Modelo: $modelo (Longitud: $longitudModelo carácteres)<br>";
    echo "Matrícula: $matricula (Longitud: $longitudMatricula carácteres)<br>";
    echo "Fecha de matriculación: " . date("d/m/Y", $timestamp) . "<br>";
    //Si no hay comentarios no se muestra esa sección
    if ($comentarios=="")
    {}else{
    echo "Comentarios: $comentarios<br>";
    }
    echo "<br>Información detallada de la fecha de matriculación:<br>";
    echo "Día de la semana: " . $dia . "<br>";
    echo "Mes: " . $mes . "<br>";
    echo "Año: " . $fechaInfo['year'] . "<br><br>";
    echo "<button class='volver' onclick='history.back();'>VOLVER</button></div> ";

}
?>

</body>
</html>