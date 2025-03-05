<?php

require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login_usuario = $_POST['login_usuario'];
    $nombre_completo = $_POST['nombre_completo'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    // Verificar que el login no exista
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE login_usuario = ?");
    $stmt->bind_param("s", $login_usuario);
    $stmt->execute();
    $stmt->store_result();



    if ($stmt->num_rows > 0) {
    } else {
        // Insertar nuevo usuario
        $password_cifrada = password_hash($password, PASSWORD_DEFAULT);

        $stmt2 = $conexion->prepare("INSERT INTO usuarios (login_usuario, nombre_completo, password, tipo) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("ssss", $login_usuario, $nombre_completo, $password_cifrada, $tipo);

        if ($stmt2->execute()) {
            echo "<p>Usuario registrado correctamente.</p>";
            header("Location: index.php");
        } else {
            echo "<p>Error al registrar el usuario.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    require_once "header.php";
    ?>

    <main>
        <h1>Registro de Usuario</h1>
        <form method="POST" action="registro.php">
            <label for="login_usuario">Nombre de usuario:</label>
            <input type="text" id="login_usuario" name="login_usuario" required><br><br>

            <label for="nombre_completo">Nombre completo:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>

            <select name="tipo">
                <option value="normal">Normal</option>
                <option value="socio">Socio</option>
            </select><br><br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($stmt->num_rows > 0) {
                    echo "<p>El usuario ya existe. Intenta con otro nombre de usuario.</p>";
                    $stmt->close();
                }
            }
            ?>

            <button type="submit">Registrar</button>
        </form>
    </main>
    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
</body>

</html>