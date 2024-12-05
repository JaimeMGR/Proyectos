"use strict";

import { agregarVideojuego, eliminarVideojuego, listarVideojuegos, buscarPorGenero, ordenarPorPuntuacion, filtrarPorPuntuacionMinima } from './funciones.js';

console.log("Aplicación de Videojuegos");

function menu() {
    let opcion;
    do {
        opcion = prompt(
            "Elige una opción:\n" +
            "1. Listar videojuegos\n" +
            "2. Agregar videojuego\n" +
            "3. Eliminar videojuego\n" +
            "4. Buscar por género\n" +
            "5. Ordenar por puntuación\n" +
            "6. Filtrar por puntuación mínima\n" +
            "7. Salir"
        );

        switch (opcion) {
            case '1':
                listarVideojuegos();
                break;
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
                console.log("Saliendo de la aplicación.");
                break;
            default:
                console.log("Opción no válida. Inténtalo de nuevo.");
        }
    } while (opcion !== '7');
}

menu();
