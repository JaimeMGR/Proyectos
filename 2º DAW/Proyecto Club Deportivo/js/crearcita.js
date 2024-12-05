"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const errorContainer = document.getElementById("error-container");

    form.addEventListener("submit", function (event) {
        // Limpiar mensajes de error previos
        errorContainer.innerHTML = "";

        // Variables de los campos del formulario
        const titulo = document.getElementById("titulo").value.trim();
        const contenido = document.getElementById("contenido").value.trim();
        const imagen = document.getElementById("imagen").files[0];

        // Obtener la fecha actual
        const fechaActual = new Date();
        const fechaPublicacion = new Date(document.getElementById("fecha_publicacion")?.value);

        // Validaciones
        let hasError = false;

        // Validar título: mínimo 3 caracteres
        if (titulo.length < 3) {
            errorContainer.innerHTML += "<p>El título debe tener al menos 3 caracteres.</p>";
            hasError = true;
        }

        // Validar contenido: mínimo 3 caracteres
        if (contenido.length < 3) {
            errorContainer.innerHTML += "<p>El contenido debe tener al menos 3 caracteres.</p>";
            hasError = true;
        }

        // Validar fecha de publicación: posterior a la fecha actual
        if (isNaN(fechaPublicacion) || fechaPublicacion <= fechaActual) {
            errorContainer.innerHTML += "<p>La fecha de publicación debe ser posterior a la fecha actual.</p>";
            hasError = true;
        }

        // Validar imagen: formato JPEG y tamaño máximo de 5MB
        if (imagen) {
            if (imagen.type !== "image/jpeg") {
                errorContainer.innerHTML += "<p>La imagen debe estar en formato JPEG.</p>";
                hasError = true;
            }
            if (imagen.size > 5 * 1024 * 1024) { // 5MB
                errorContainer.innerHTML += "<p>La imagen no debe superar los 5MB de tamaño.</p>";
                hasError = true;
            }
        } else {
            errorContainer.innerHTML += "<p>Es obligatorio subir una imagen en formato JPEG.</p>";
            hasError = true;
        }

        // Prevenir el envío del formulario si hay errores
        if (hasError) {
            event.preventDefault();
        }
    });
});
