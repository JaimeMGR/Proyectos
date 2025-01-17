cerrar_sesion.php:

<?php
    session_start();
    session_destroy();
    header("Location:index.php");
?>

contacto.php:

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        require_once "header.php";
    ?>
    <main>
        <h2>Contacto</h2>
        <p>¿Tienes preguntas? Rellena el formulario y nos pondremos en contacto contigo:</p>
        <form>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>

            <button type="submit">Enviar</button>
        </form>
    </main>
    <footer>
    <?php
        require_once "footer.php";
    ?>
    </footer>
</body>
</html>

estilos.css:

/* General */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    color: #333;
}

header {
    background: #4CAF50;
    color: white;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Contenido del header */
.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Título */
header h1 {
    margin: 0;
    flex-grow: 1; /* Esto asegura que el título ocupe todo el espacio disponible */
    text-align: center;
}

/* Contenedor del formulario de login */
.login-container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

/* Formulario de login */
.login-form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    background: rgba(237, 208, 208, 0.9);
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 250px; /* Controlamos el tamaño del formulario */
}

.login-form label {
    margin-top: 0.25rem;
    font-weight: bold;
}

.login-form input {
    width: 100%;
    padding: 0.25rem;
    margin-top: 0.25rem;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.login-form button {
    width: 100%;
    padding: 0.5rem;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 1rem;
}

.login-form button:hover {
    background: #45a049;
}

/* Navegación */
nav {
    background: #333;
}
nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}
nav ul li {
    margin: 0 1rem;
}
nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}
nav ul li a:hover {
    color: #4CAF50;
}

/* Secciones */
main{
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #f9f9f9;
}

main section h2 {
    color: #4CAF50;
}

/* Pie de página */
footer {
    background: #333;
    color: white;
    text-align: center;
    padding: 1rem 0;
}

footer.php:

<p>&copy; 2024 Mi Página Web. Todos los derechos reservados.</p>

header.php:

<header>
        <div class="header-content">
                <?php
                session_start();
                require_once "utilidades.php";
                $pagina_actual = basename($_SERVER['PHP_SELF']);
                $privilegios=true;
                echo "<div>
                       <h1>Bienvenido a Mi Página Web</h1>";
                if (!isset($_SESSION["nombre"]) && $pagina_actual!="index.php") {

                        echo "<h2>Tienes que tener cuenta para estar aquí</h2>
                              </div>";
                        $privilegios=false;
                }else if(isset($_SESSION["nombre"]) && $pagina_actual=="servicios.php" && $_SESSION["tipo"]!="admin"){
                        echo "<h2>Tienes que ser admin para estar aquí</h2>
                              </div>";
                        $privilegios=false;
                } else {
                        echo "</div>";
                }


                if (isset($_SESSION["nombre"])) {
                        echo formulario_sesion_iniciada($_SESSION["nombre"]);
                } else {
                        echo formulario_para_iniciar_sesion($pagina_actual);
                }

             ?>
        </div>
</header>

<?php
  echo menu_navegacion();
  if(!$privilegios){
        die();
  }
?>

iniciar_sesion.php:

<?php
    session_start();

    if($_POST["username"]=="admin" && $_POST["password"]=="admin"){
        $_SESSION["nombre"]=$_POST["username"];
        $_SESSION["tipo"]="admin";
    }else{
        $_SESSION["nombre"]=$_POST["username"];
        $_SESSION["tipo"]="normal";
    }
    

    header("Location:$_POST[origen]");
?>

nosotros.php:

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        require_once "header.php";
    ?>
    <main>
        <h2>Nosotros</h2>
        <p>Somos un equipo apasionado por la tecnología y el diseño. Nuestra misión es ofrecer soluciones innovadoras a nuestros clientes.</p>
        <p>Conoce más sobre nuestros valores, visión y equipo profesional que trabaja para brindar los mejores resultados.</p>
        <img src="https://img.freepik.com/vector-gratis/dibujos-animados-contacto-nosotros-ilustracion-concepto_23-2148272334.jpg" alt="Equipo" />
    </main>
    <footer>
    <?php
        require_once "footer.php";
    ?>
    
    </footer>
</body>
</html>


servicios.php:

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
        require_once "header.php";
    ?>
    <main>
        <h2>Servicios</h2>
        <p>Ofrecemos una variedad de servicios diseñados para cubrir todas tus necesidades tecnológicas y de diseño:</p>
        <ul>
            <li><strong>Desarrollo web:</strong> Sitios personalizados y aplicaciones dinámicas.</li>
            <li><strong>Diseño gráfico:</strong> Branding y diseño profesional.</li>
            <li><strong>Marketing digital:</strong> SEO, redes sociales y más.</li>
        </ul>
        <img src="https://media.licdn.com/dms/image/C4D12AQH0rT7mEETcUA/article-cover_image-shrink_600_2000/0/1599807413428?e=2147483647&v=beta&t=whOJy3lS85vBOkHJR__ogSM6klCeJmILyXXKqJpD9U4" alt="Servicios" />
    </main>
    <footer>
        <?php
        require_once "footer.php";
        ?>
    </footer>
</body>

</html>

utilidades.php:

<?php
function formulario_para_iniciar_sesion($pagina_actual){
    return "<div class='login-container'>
                            <form class='login-form' action='iniciar_sesion.php' method='POST'>
                                <label for='username'>Usuario:</label>
                                <input type='text' id='username' name='username'  placeholder='Introduce tu usuario'>
                                <label for='password'>Contraseña:</label>
                                <input type='password' id='password' name='password'  placeholder='Introduce tu contraseña'>
                                <input type='hidden' id='origen' name='origen' value='$pagina_actual'>
                                <button type='submit'>Iniciar sesión</button>
                            </form>
                        </div>";
}

function formulario_sesion_iniciada($nombre_usuario){
    return "<div class='login-container'>
                            <form class='login-form' action='cerrar_sesion.php' method='POST'>
                                 <label for=>Usuario logueado:$nombre_usuario</label>
                                <button type='submit'>Cerrar sesión</button>
                            </form>
                          </div>";
}


function menu_navegacion(){
    return "<nav>
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='nosotros.php'>Nosotros</a></li>
                <li><a href='servicios.php'>Servicios</a></li>
                <li><a href='contacto.php'>Contacto</a></li>
            </ul>
        </nav>";
}
?>
