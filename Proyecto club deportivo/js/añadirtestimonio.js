"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const errorContainer = document.getElementById("error-container");

    form.addEventListener("submit", function (event) {
        // Limpiar mensajes de error previos
        errorContainer.innerHTML = "";

        // Variables de los campos del formulario
        const contenido = document.getElementById("contenido").value.trim();
        const socio = document.getElementById("socio").value;

        // Validaciones
        let hasError = false;

        // Validar que el contenido del testimonio no esté vacío
        if (contenido === "") {
            errorContainer.innerHTML += "<p>El contenido del testimonio no puede estar vacío.</p>";
            hasError = true;
        }

        // Validar que se haya seleccionado un socio
        if (socio === "") {
            errorContainer.innerHTML += "<p>Debe seleccionar un socio.</p>";
            hasError = true;
        }

        // Prevenir el envío del formulario si hay errores
        if (hasError) {
            event.preventDefault();
        }
    });
});
