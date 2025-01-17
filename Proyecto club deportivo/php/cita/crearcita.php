<?php
include '../esencial/conexion.php';

 // Recibir los datos del formulario
 $alumno = $_POST['alumno'];
 $clase = $_POST['clase'];
 $fecha = $_POST['fecha'];
 $hora = $_POST['hora'];
 $estado = 1;

//  Comrprobar si la cita ya existe
 $query = "SELECT * FROM cita WHERE codigo_socio =? AND codigo_servicio =? AND fecha =? AND hora =?";
 $stmt = $conexion->prepare($query);
 $stmt->bind_param("ssis", $alumno, $clase, $fecha, $hora);
 $stmt->execute();

 // Verificar si la cita ya existe
 if ($stmt->fetch()) {
   echo "La cita ya existe para el alumno seleccionado";
   header('Refresh: 2; url=crearcita.php');
   exit();
 }else{

 // Preparar la consulta de inserción con parámetros
 $query = "INSERT INTO cita (codigo_socio, codigo_servicio, fecha, hora, estado) VALUES (?, ?, ?, ?, ?)";
 $stmt = $conexion->prepare($query);

 // Enlazar los parámetros (s: string, i: integer)
 $stmt->bind_param("sisss", $alumno, $clase, $fecha, $hora, $estado);

 // Ejecutar la consulta e informar del resultado
 if ($stmt->execute()) {
 } else {
   echo "Error: " . $stmt->error;
 }

 // Cerrar la declaración y la conexión
 $stmt->close();
 
 echo "Cita creada correctamente";
}
 header('Refresh: 0.1; url=clases.php');


?>