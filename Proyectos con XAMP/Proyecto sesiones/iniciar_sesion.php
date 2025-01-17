<?php

session_start();
require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, password, tipo FROM usuarios WHERE login_usuario = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['nombre'] = $username;
            $_SESSION['tipo'] = $row['tipo'];
            header("Location: " . $_POST['origen']);
            exit();
        }
    } else {
        header("Location: " . $_POST['origen'] . "?error=1");
    }
}
