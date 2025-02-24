<<<<<<< Updated upstream
<!-- Programar una función PHP que pida un nombre completo y sus calificaciones
(sobresaliente, notable, aprobado, etc) de matemáticas, lengua, historia y dibujo en
forma de array asociativo. El resultado debe ser un código HTML que muestre este
boletín de notas: -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alumnos = array(array(
        "Alumno" => "Juan Ramírez",
        "Matemáticas" => "Sobresaliente",
        "Lengua" => "Notable",
        "Historia" => "Notable",
        "Dibujo" => "Insuficiente"),

        array("Alumno" => "Jaime Molina",
        "Matemáticas" => "Sobresaliente",
        "Lengua" => "Sobresaliente",
        "Historia" => "Sobresaliente",
        "Dibujo" => "Sobresaliente"),
        
        array("Alumno" => "Alex Arrabal",
        "Matemáticas" => "Sobresaliente",
        "Lengua" => "Bien",
        "Historia" => "Sobresaliente",
        "Dibujo" => "Notable"),

        
        array("Alumno" => "David Fernández",
        "Matemáticas" => "Notable",
        "Lengua" => "Suficiente",
        "Historia" => "Sobresasliente",
        "Dibujo" => "Notable")
    );
    $contador=0;
        foreach ($alumnos as $alumno) {
        $nombre = $alumno["Alumno"];
        echo "<table border='1'>";
        echo "<tr>";

        echo "</tr>";
        
        echo "<tr class='contenido'>";
        foreach ($alumno as $valor=>$calificacion) {
            if ($contador==0){
            echo "<th>$valor</th>";
            echo "<th>$calificacion</th>";
            echo "</tr>";   
            $contador++;
            }else{
            echo "<td>$valor</td>";
            echo "<td>$calificacion</td>";
            echo "</tr>";
            
            $contador++;
        }
    }
    $contador=0;
    }
    ?>
</body>
=======
<!-- Programar una función PHP que pida un nombre completo y sus calificaciones
(sobresaliente, notable, aprobado, etc) de matemáticas, lengua, historia y dibujo en
forma de array asociativo. El resultado debe ser un código HTML que muestre este
boletín de notas: -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alumnos = array(array(
        "Alumno" => "Juan Ramírez",
        "Matemáticas" => "Sobresaliente",
        "Lengua" => "Notable",
        "Historia" => "Notable",
        "Dibujo" => "Insuficiente"),

        array("Alumno" => "Jaime Molina",
        "Matemáticas" => "Sobresaliente",
        "Lengua" => "Sobresaliente",
        "Historia" => "Sobresaliente",
        "Dibujo" => "Sobresaliente"),
        
        array("Alumno" => "Alex Arrabal",
        "Matemáticas" => "Sobresaliente",
        "Lengua" => "Bien",
        "Historia" => "Sobresaliente",
        "Dibujo" => "Notable"),

        
        array("Alumno" => "David Fernández",
        "Matemáticas" => "Notable",
        "Lengua" => "Suficiente",
        "Historia" => "Sobresasliente",
        "Dibujo" => "Notable")
    );
    $contador=0;
        foreach ($alumnos as $alumno) {
        $nombre = $alumno["Alumno"];
        echo "<table border='1'>";
        echo "<tr>";

        echo "</tr>";
        
        echo "<tr class='contenido'>";
        foreach ($alumno as $valor=>$calificacion) {
            if ($contador==0){
            echo "<th>$valor</th>";
            echo "<th>$calificacion</th>";
            echo "</tr>";   
            $contador++;
            }else{
            echo "<td>$valor</td>";
            echo "<td>$calificacion</td>";
            echo "</tr>";
            
            $contador++;
        }
    }
    $contador=0;
    }
    ?>
</body>
>>>>>>> Stashed changes
</html>