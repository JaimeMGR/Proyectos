<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $mascotas=array(
            array("Nombre"=>"Pepe","Peso"=>"4.5","Color"=>"Marrón","Edad"=>"12"),
            array("Nombre"=>"Sparky","Peso"=>"3","Color"=>"Blanco","Edad"=>"2"),
            array("Nombre"=>"Tobby","Peso"=>"7.2","Color"=>"Beige","Edad"=>"8"),
            array("Nombre"=>"Bigotes","Peso"=>"4","Color"=>"Negro","Edad"=>"9"),
            array("Nombre"=>"Ricky","Peso"=>"0.1","Color"=>"Verde","Edad"=>"2"));
            $fila=0;
?>

            <h2>Tabla de mascotas</h2>
            <table class=perros></table>
            <thead>
          
            
            <table border=1>
                <th>Fila</th>
            <?php
        $caracteristicas=array_keys($mascotas[0]);
        foreach($caracteristicas as $item){
            echo "<th>$item</th>";
        }
        ?></thead><tbody>
 <?php
        echo "<tr>";
// Mostrar los datos de cada perro en la tabla
foreach ($mascotas as $mascota) {
    echo "<tr class='contenido'>";
    echo"<td>$fila</td>";
    $fila++;
    foreach ($mascota as $valor) {
        echo "<td>$valor</td>";
    }
    echo "</tr>";
}
    ?>
    </tbody>
    </table>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $mascotas=array(
            array("Nombre"=>"Pepe","Peso"=>"4.5","Color"=>"Marrón","Edad"=>"12"),
            array("Nombre"=>"Sparky","Peso"=>"3","Color"=>"Blanco","Edad"=>"2"),
            array("Nombre"=>"Tobby","Peso"=>"7.2","Color"=>"Beige","Edad"=>"8"),
            array("Nombre"=>"Bigotes","Peso"=>"4","Color"=>"Negro","Edad"=>"9"),
            array("Nombre"=>"Ricky","Peso"=>"0.1","Color"=>"Verde","Edad"=>"2"));
            $fila=0;
?>

            <h2>Tabla de mascotas</h2>
            <table class=perros></table>
            <thead>
          
            
            <table border=1>
                <th>Fila</th>
            <?php
        $caracteristicas=array_keys($mascotas[0]);
        foreach($caracteristicas as $item){
            echo "<th>$item</th>";
        }
        ?></thead><tbody>
 <?php
        echo "<tr>";
// Mostrar los datos de cada perro en la tabla
foreach ($mascotas as $mascota) {
    echo "<tr class='contenido'>";
    echo"<td>$fila</td>";
    $fila++;
    foreach ($mascota as $valor) {
        echo "<td>$valor</td>";
    }
    echo "</tr>";
}
    ?>
    </tbody>
    </table>
</body>
>>>>>>> Stashed changes
</html>