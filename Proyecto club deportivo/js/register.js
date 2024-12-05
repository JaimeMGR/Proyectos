"use strict";

document.querySelector("form").addEventListener("submit", function (event) {
    const errorContainer = document.getElementById("error-container");
    errorContainer.innerHTML = ""; // Limpiar errores previos

    // Variables de los campos del formulario
    const nombre = document.getElementById("nombre").value.trim();
    const edad = parseInt(document.getElementById("edad").value.trim());
    const contrasena = document.getElementById("contrasena").value.trim();
    const usuario = document.getElementById("usuario").value.trim();
    const telefono = document.getElementById("telefono").value.trim();
    const foto = document.getElementById("foto").files[0];

    let hasError = false;

    // Validaciones
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
    if (isNaN(edad) || edad > 100) {
        errorContainer.innerHTML += "<p>La edad no puede ser superior a 100.</p>";
        hasError = true;
    }

    // Contraseña: letras, números, guiones bajos, empieza con letra, 8-16 caracteres
    if (!/^[a-zA-Z][a-zA-Z0-9_]{7,15}$/.test(contrasena)) {
        errorContainer.innerHTML += "<p>La contraseña debe comenzar con una letra, tener entre 8 y 16 caracteres, y contener solo letras, números o guiones bajos.</p>";
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

    // Foto: formato JPEG y tamaño máximo de 5MB
    if (foto) {
        if (foto.type !== "image/jpeg") {
            errorContainer.innerHTML += "<p>La foto debe ser un archivo JPEG.</p>";
            hasError = true;
        }
        if (foto.size > 5 * 1024 * 1024) {
            errorContainer.innerHTML += "<p>La foto no debe superar los 5MB de tamaño.</p>";
            hasError = true;
        }
    } else {
        errorContainer.innerHTML += "<p>Es obligatorio subir una foto en formato JPEG.</p>";
        hasError = true;
    }

    // Prevenir el envío del formulario si hay errores
    if (hasError) {
        event.preventDefault();
    }
});
