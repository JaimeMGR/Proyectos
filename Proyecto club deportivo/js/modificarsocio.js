"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const errorContainer = document.getElementById("error-container");

    form.addEventListener("submit", function (event) {
        // Limpiar mensajes de error previos
        errorContainer.innerHTML = "";

        // Variables de los campos del formulario
        const nombre = document.getElementById("nombre").value.trim();
        const edad = parseInt(document.getElementById("edad").value.trim());
        const usuario = document.getElementById("usuario").value.trim();
        const telefono = document.getElementById("telefono").value.trim();
        const imagen = document.getElementById("imagen").files[0];

        // Validaciones
        let hasError = false;

        // Nombre: solo letras, 4-50 caracteres
        if (!/^[a-zA-Z\s]{4,50}$/.test(nombre)) {
            errorContainer.innerHTML += "<p>El nombre debe contener solo letras, entre 4 y 50 caracteres.</p>";
            hasError = true;
        }

        // Edad: al menos 18 años
        if (isNaN(edad) || edad < 18) {
            errorContainer.innerHTML += "<p>La edad debe ser un número mayor o igual a 18.</p>";
            hasError = true;
        }

        // Edad: menos de 101 años
        if (isNaN(edad) || edad > 101) {
            errorContainer.innerHTML += "<p>Vete a ver Juan y Medio.</p>";
            hasError = true;
        }

        // Usuario: letras, números, empieza con letra, 5-20 caracteres
        if (!/^[a-zA-Z][a-zA-Z0-9]{4,19}$/.test(usuario)) {
            errorContainer.innerHTML += "<p>El usuario debe comenzar con una letra, tener entre 5 y 20 caracteres, y contener solo letras o números.</p>";
            hasError = true;
        }

        // Teléfono: formato español (+34 seguido de 9 dígitos)
        if (telefono && !/^\+34\d{9}$/.test(telefono)) {
            errorContainer.innerHTML += "<p>El teléfono debe tener el formato español (+34 seguido de 9 dígitos).</p>";
            hasError = true;
        }

        // Imagen: formato JPEG y tamaño máximo de 5MB
        if (imagen) {
            if (imagen.type !== "image/jpeg") {
                errorContainer.innerHTML += "<p>La imagen debe ser un archivo JPEG.</p>";
                hasError = true;
            }
            if (imagen.size > 5 * 1024 * 1024) {
                errorContainer.innerHTML += "<p>La imagen no debe superar los 5MB de tamaño.</p>";
                hasError = true;
            }
        }

        // Prevenir el envío del formulario si hay errores
        if (hasError) {
            event.preventDefault();
        }
    });
});
