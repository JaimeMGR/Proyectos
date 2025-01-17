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
