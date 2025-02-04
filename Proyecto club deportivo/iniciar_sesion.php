<?php

session_start();
require_once "php/esencial/conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['origen'] = $_SERVER['HTTP_REFERER'];
    var_dump($_SESSION['origen']);
    // verifico que los datos de ingreso no esten vacios
    if (empty($username) || empty($password)) {
        
        exit();
    }
    echo "$username $password <br>";
    $stmt = $conexion->prepare("SELECT id_socio, contrasena, tipo FROM socio WHERE usuario = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    var_dump($result);
    if ($row = $result->fetch_assoc()) {
        var_dump($row);
        if (password_verify($password, $row['contrasena'])) {
            $_SESSION['nombre'] = $username;
            $_SESSION['tipo'] = $row['tipo'];
            header("Location: " . $_SESSION['origen']);
            exit();
        }
    }
    header("Location: ". $_SESSION['origen'] ."?error=1");
}
