<!-- - Existirá una nuevo sección llamada usuarios. Si el usuario no ha iniciado sesión se deberá mostrar un formulario de registro de usuario para meter los datos mencionados en la 	
base de datos, teniendo en cuenta que no se puede crear un nuevo admin. Solo existe uno y se creará a mano desde phpmyadmin.
- No puede haber dos usuarios con el mismo login de usuario
- Si el usuario ha iniciado sesión y es de tipo normal o socio, verá un formulario relleno con sus datos, donde podrá modificarlos (el password no puede verse), excepto el tipo 	de usuario.
- Si es el usuario admin entra en la sección de usuario, vera una lista de usuarios y podrá borrarlos con un botón. -->

<?php
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    require_once "header.php";
    ?>
    <main>
        <?php
        if (!isset($_SESSION["nombre"]) && $pagina_actual == "usuarios.php") {
            echo '<form class="registro" action="registro.php" method="post">
            <h1>Formulario de registro</h1>
            <label for="login_usuario">Nombre de usuario: </label>
            <input type="text" name="login_usuario"><br>
            <label for="nombre_completo">Nombre completo: </label>
            <input type="text" name="nombre_completo"><br>
            <label for="" password>Contraseña: </label>
            <input type="password" name="password"><br>
            <label for="tipo">Tipo de usuario: </label>
            <select name="tipo">
                <option value="normal">Normal</option>
                <option value="socio">Socio</option>
            </select>
            <button type="submit">Registrar</button>
        </form>
        <br>';
        } else if (isset($_SESSION["nombre"]) && $pagina_actual == "usuarios.php" && $_SESSION["tipo"] == "admin") {
            echo '<form class="registro" action="registro.php" method="post">
            <h1>Formulario de registro</h1>
            <label for="login_usuario">Nombre de usuario: </label>
            <input type="text" name="login_usuario"><br>
            <label for="nombre_completo">Nombre completo: </label>
            <input type="text" name="nombre_completo"><br>
            <label for="" password>Contraseña: </label>
            <input type="password" name="password"><br>
            <label for="tipo">Tipo de usuario: </label>
            <select name="tipo">
                <option value="normal">Normal</option>
                <option value="socio">Socio</option>
            </select>
            <button type="submit">Registrar</button>
        </form>
        <br>';
            echo "<table class='tablausuarios'>
            <tr>
                <th>ID</th>
                <th>Nombre de usuario</th>
                <th>Nombre completo</th>
                <th>Tipo de usuario</th>
                <th></th>
                <th></th>
            </tr>";
            $query = 'SELECT * FROM usuarios;';
            $result = mysqli_query($conexion, $query);
            if (!$result) {
                die('Query fallido: ' . mysqli_error($conexion));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>;
                <td> ' . $row["id"] . '</td>
                <td>' . $row["login_usuario"] . '</td>
                <td>' . $row["nombre_completo"] . '</td>
                <td>' . $row["tipo"] . '</td>
                <td><form method="POST" action="usuarios_borrar.php" style="display: inline">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value=' . $row["id"] . '>
                        <button type="submit">Eliminar usuario</button>
                    </form></td>
                <td><form method="POST" action="usuarios_editar.php" style="display: inline;">
                        <input type="hidden" name="accion" value="editar">
                        <input type="hidden" name="id" value=' . $row["id"] . '>
                        <button type="submit">Editar usuario</button>
                    </form></td>';
            }
            echo '</tr></table></div>';
            $privilegios = true;
        } else if (isset($_SESSION["nombre"]) && $pagina_actual == "usuarios.php" && $_SESSION["tipo"] == "socio") {
            $nombre_actual = $_SESSION['nombre'];
            $query = 'SELECT id, login_usuario, nombre_completo, password, tipo  FROM usuarios WHERE login_usuario = "' . $nombre_actual . '"';
            $stmt = $conexion->prepare($query);
            $stmt->execute();
            $stmt->bind_result($id, $login_usuario, $nombre_completo, $password, $tipo);

            while ($stmt->fetch()) {
                echo "<div class='datos'>";
                echo "<h2>Datos actuales del usuario</h2>";
                echo "<p><strong> Nombre completo: </strong>  $nombre_completo </p>";
                echo "<p><strong>Nombre de usuario:</strong> " . $login_usuario . "</p>";
                echo "<p><strong>Tipo:</strong> " . $tipo . "</p>";
                echo "</div>";


                echo "<div class='datos'>";
                echo "<h2>Modificar datos</h2>";
                echo "<form action='usuarios_modificado.php' method='POST'>";
                echo "<label for='nombre_completo'>Nombre completo:</label><br>";
                echo "<input type='hidden' name='id' value='$id'>";
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

                echo "</div>";
            }
        } else if (isset($_SESSION["nombre"]) && $pagina_actual == "usuarios.php" && $_SESSION["tipo"] == "normal") {
            $nombre_actual = $_SESSION['nombre'];
            $query = 'SELECT id, login_usuario, nombre_completo, password, tipo  FROM usuarios WHERE login_usuario = "' . $nombre_actual . '"';
            $stmt = $conexion->prepare($query);
            $stmt->execute();
            $stmt->bind_result($id, $login_usuario, $nombre_completo, $password, $tipo);

            while ($stmt->fetch()) {
                echo "<div class='datos'>";
                echo "<h2>Datos actuales del usuario</h2>";
                echo "<p><strong> Nombre completo: </strong>  $nombre_completo </p>";
                echo "<p><strong>Nombre de usuario:</strong> " . $login_usuario . "</p>";
                echo "<p><strong>Tipo:</strong> " . $tipo . "</p>";
                echo "</div>";


                echo "<div class='datos'>";
                echo "<h2>Modificar datos</h2>";
                echo "<form action='usuarios_modificado.php' method='POST'>";
                echo "<label for='nombre_completo'>Nombre completo:</label><br>";
                echo "<input type='hidden' name='id' value='$id'>";
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

                echo "</div>";
            }
        }
        ?>
        </table>
    </main>
    <footer>
        <?php
        include_once "footer.php"
        ?>
    </footer>

</body>

</html>