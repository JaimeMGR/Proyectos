"use strict"

import { agregarVideojuego, eliminarVideojuego, listarVideojuegos, buscarPorGenero, ordenarPorPuntuacion, filtrarPorPuntuacionMinima } from './funciones.js';

let output = document.getElementById("output");

output.innerHTML = "<h2>Aplicación de Videojuegos</h2>";

function menu() {
    let opcion = prompt(
        "Elige una opción:\n1. Listar videojuegos\n2. Agregar videojuego\n3. Eliminar videojuego\n4. Buscar por género\n5. Ordenar por puntuación\n6. Filtrar por puntuación mínima\n7. Salir"
    );

    switch (opcion) {
        case '1':
            listarVideojuegos();
            return;
        case '2':
            let nombre = prompt("Introduce el nombre del videojuego:");
            let genero = prompt("Introduce el género del videojuego:");
            let lanzamiento = parseInt(prompt("Introduce el año de lanzamiento:"));
            let puntuacion = parseFloat(prompt("Introduce la puntuación del videojuego:"));
            agregarVideojuego(nombre, genero, lanzamiento, puntuacion);
            break;
        case '3':
            let nombreEliminar = prompt("Introduce el nombre del videojuego a eliminar:");
            eliminarVideojuego(nombreEliminar);
            break;
        case '4':
            let generoBuscar = prompt("Introduce el género para buscar videojuegos:");
            buscarPorGenero(generoBuscar);
            break;
        case '5':
            ordenarPorPuntuacion();
            break;
        case '6':
            let puntuacionMinima = parseFloat(prompt("Introduce la puntuación mínima para filtrar:"));
            filtrarPorPuntuacionMinima(puntuacionMinima);
            break;
        case '7':
            output.innerHTML += "Saliendo de la aplicación.";
            return;
        default:
            output.innerHTML += "Opción no válida. Inténtalo de nuevo.<br>";
    }

    menu();
}

menu();
