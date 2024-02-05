<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paginaweb";

// Crea una conexión a MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtiene los datos del formulario utilizando el método POST
$nombre_usuario = $_POST['nombre_usuario'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$clave = $_POST['clave'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];

// Prepara la sentencia SQL para insertar los datos en la tabla correspondiente
$sql = "INSERT INTO usuarios (nombre_usuario, nombre, apellidos, email, clave, fecha_nacimiento, genero)
VALUES ('$nombre_usuario', '$nombre', '$apellidos', '$email', '$clave', '$fecha_nacimiento', '$genero')";

// Ejecuta la sentencia SQL y verifica si se insertaron correctamente los datos
if (mysqli_query($conn, $sql)) {
    echo "Los datos se insertaron correctamente en la base de datos";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cierra la conexión
mysqli_close($conn);
?>
