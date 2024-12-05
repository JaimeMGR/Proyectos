"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const errorContainer = document.getElementById("error-container");

    form.addEventListener("submit", function (event) {
        // Limpiar mensajes de error previos
        errorContainer.innerHTML = "";

        // Variables de los campos del formulario
        const nombre = document.getElementById("nombre").value.trim();
        const duracion = parseInt(document.getElementById("duracion").value.trim());
        const precio = parseFloat(document.getElementById("precio").value.trim());
        const foto = document.getElementById("foto").files[0];

        // Validaciones
        let hasError = false;

        // Validar nombre: longitud entre 3 y 50 caracteres
        if (nombre.length < 3 || nombre.length > 50) {
            errorContainer.innerHTML += "<p>El nombre del servicio debe tener entre 3 y 50 caracteres.</p>";
            hasError = true;
        }

        // Validar duración: mínimo 15 minutos
        if (isNaN(duracion) || duracion < 15) {
            errorContainer.innerHTML += "<p>La duración debe ser como mínimo 15 minutos.</p>";
            hasError = true;
        }

        // Validar precio: no puede ser inferior a 0
        if (isNaN(precio) || precio < 0) {
            errorContainer.innerHTML += "<p>El precio del servicio debe ser un número positivo.</p>";
            hasError = true;
        }

        // Validar foto: formato imagen y tamaño máximo de 5MB
        if (foto) {
            if (!["image/jpeg", "image/png", "image/gif"].includes(foto.type)) {
                errorContainer.innerHTML += "<p>La imagen debe ser de formato JPEG, PNG o GIF.</p>";
                hasError = true;
            }
            if (foto.size > 5 * 1024 * 1024) { // 5MB
                errorContainer.innerHTML += "<p>La imagen no debe superar los 5MB de tamaño.</p>";
                hasError = true;
            }
        } else {
            errorContainer.innerHTML += "<p>Es obligatorio subir una imagen.</p>";
            hasError = true;
        }

        // Prevenir el envío del formulario si hay errores
        if (hasError) {
            event.preventDefault();
        }
    });
});
