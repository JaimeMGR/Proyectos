"use strict"

function Header() {
    const header = document.createElement("header");
    header.innerHTML = `
        <div class="logo">
            <a href="index.php">
                <img id="logo" src="imagenes/AtarfeFighting.png" alt="Logo Atarfe Fighting"></img>
            </a>
        </div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="entrenadores.php">Entrenadores</a>
            <a href="servicios.php">Servicios</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
            <a class="register" href="register.php">Registrarse</a>
        </nav>
    `;
    document.body.appendChild(header);
}
