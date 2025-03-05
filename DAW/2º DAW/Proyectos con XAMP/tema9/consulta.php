<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conexion=new mysqli("localhost","root","","centro");
        $conexion->set_charset("utf8");
        $consulta="SELECT * FROM Alumnos";

        $resultado=$conexion->query($consulta);

        echo "<h1>Hay $resultado->num_rows alumnos</h1>";

        $DNI_NUEVO="78108311N";
        $nombre_nuevo="Jaime Molina Granados";
        $edad_nueva=21;

        $insertar="INSERT INTO Alumnos
                   VALUES ($DNI_NUEVO, $nombre_nuevo, $edad_nueva)";

        $resultado=$conexion->query($insertar);

        echo $resultado->error."<br>";

        if($resultado->num_rows>0){
            echo "Se ha insertado un nuuevo alumno<br>";
        }else{
            echo "No se ha insertado un nuevo alumno, posiblemente ya existe";
        } 
    

        while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
            // echo "$fila[0]<br>$fila[1]<br>$fila[2]<br>";
            $dni_alumno=$fila["dni"];
            $nombre_alumno=$fila["nombre_completo"];
            $edad_alumno=$fila["edad"];
            echo "$fila[dni]-$fila[nombre_completo]-$fila[edad]<br>";
            echo "$dni_alumno-$nombre_alumno-$edad_alumnos<br>";
        }

        $borrar="DELETE FROM Alumnos 
                 WHERE dni=$dni_nuevo";

                 $resultado=$conexion->query($borrar);

                 if($resultado){
                    echo "El alumno con DNI $DNI_nuevo se ha eliminado<br>";
                 }else{
                    echo "No se ha eliminado ningun, posiblemente el DNI sea erroneo<br>";
                 }

                 $nuevo_nombre="Jaime ";
        $actualizar="UPDATE TABLE Alumnos
                     SET nombre_completo=$nuevo_nombre";

        $conexion->close();
    ?>
</body>
</html>