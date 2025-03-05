<?php
include 'conexion.php';

$id = $_POST['id'];

// Realizar la consulta para obtener los socios de la página actual con límite y desplazamiento
$query = "SELECT id, login_usuario, nombre_completo, password, tipo FROM usuarios WHERE id = '$id'";
$stmt = $conexion->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $login_usuario, $nombre_completo, $password, $tipo);




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="estilos.css">


</head>

<body style="background:#f4f4f9">
    <?php include 'header.php' ?>
    <main>
        <h1>Modificar Usuario</h1>

        <div>
            <?php
            while ($stmt->fetch()) {
                echo "<div class='datos'>";
                echo "<h2>Datos actuales del usuario</h2>";
                echo "<p><strong> Nombre completo: </strong>" . $nombre_completo . "</p>";
                echo "<p><strong>Nombre de usuario:</strong> " . $login_usuario . "</p>";
                echo "<p><strong>Tipo:</strong> " . $tipo . "</p>";
                echo "</div>";
            }
            $stmt->close();
            $conexion->close();
            echo "<div class='datos'>";
            echo "<h2>Modificar datos</h2>";
            echo "<form action='usuarios_modificado.php' method='POST'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='nombre_completo'>Nombre completo:</label><br>";
            echo "<input type='text' id='nombre_completo' name='nombre_completo' placeholder='$nombre_completo'><br>";
            echo "<label for='login_usuario'>Nombre de usuario:</label><br>";
            echo "<input type='text' id='login_usuario' name='login_usuario' placeholder='$login_usuario'><br>";
            echo "<label for='password'>Contraseña:</label><br>";
            echo "<input type='password' id='password' name='password'><br>";
            echo "<label for='tipo'>Tipo:</label><br>";
            echo "<select id='tipo' name='tipo' placeholder='$tipo'>";
            echo "<option value='normal'>Normal</option>";
            echo "<option value='socio'>Socio</option>";
            echo "</select><br>";
            echo "<input type='submit' value='Modificar'>";
            echo "</form>";
            echo "</div>";
            ?>
        </div>
        <br>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>


</html>