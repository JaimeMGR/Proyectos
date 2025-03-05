<?php
include 'conexion.php';

$id = $_POST['id'];

// Preparar la consulta con una declaración preparada
$query = "SELECT id, login_usuario, nombre_completo, password, tipo FROM usuarios WHERE id = '$id'";
$stmt = $conexion->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $login_usuario, $nombre_completo, $password, $tipo);
$stmt->fetch();
$stmt->close();

$nombre_completo_actual = $nombre_completo;
$login_usuario_actual = $login_usuario;
$password_actual = $password;
$tipo_actual = $tipo;



// Recibir los datos del formulario
$nombre_completo = !empty($_POST['nombre_completo']) ? $_POST['nombre_completo'] : $nombre_completo_actual;
$login_usuario = !empty($_POST['login_usuario']) ? $_POST['login_usuario'] : $login_usuario_actual;
$password = !empty($_POST['password']) ? $_POST['password'] : $password_actual;
$tipo = !empty($_POST['tipo']) ? $_POST['tipo'] : $tipo_actual;

$password_cifrada = password_hash($password, PASSWORD_DEFAULT);

// Preparar la consulta de inserción con parámetros usando una consulta preparada

$query2 = "UPDATE usuarios SET login_usuario  = ?, nombre_completo = ?, password = ?, tipo = ?  WHERE id = ?";
$stmt2 = $conexion->prepare($query2);
echo ("$login_usuario, $nombre_completo, $password_cifrada, $tipo, $id<br>");
// Enlazar los parámetros (s: string, i: integer)
var_dump($query2);
$stmt2 = $conexion->prepare($query2);

// Enlazar los parámetros (s: string, i: integer)
$stmt2->bind_param("ssssi", $login_usuario, $nombre_completo, $password_cifrada, $tipo, $id);

// Ejecutar la consulta e informar del resultado
if ($stmt2->execute()) {
    echo "Socio modificado con éxito";
    header('Refresh: 0.1; url=cerrar_sesion_modificar.php');
    exit(); // Salir del script para evitar que se siga ejecutando el código después de la actualización
} else {
    echo "Error: " . $stmt2->error;
}

// Cerrar la declaración y la conexión
$stmt2->close();
