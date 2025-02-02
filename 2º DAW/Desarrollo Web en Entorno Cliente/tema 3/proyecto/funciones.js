"use strict"

// Exportamos funciones y el array de videojuegos
export let videojuegos = [
    { nombre: "The Witcher 3", genero: "RPG", lanzamiento: 2015, puntuacion: 9.8 },
    { nombre: "Cyberpunk 2077", genero: "Acción", lanzamiento: 2020, puntuacion: 7.5 },
    { nombre: "Minecraft", genero: "Aventura", lanzamiento: 2011, puntuacion: 9.0 },
    { nombre: "Hades", genero: "Roguelike", lanzamiento: 2020, puntuacion: 9.6 },
    { nombre: "The Legend of Zelda: Breath of the Wild", genero: "Aventura", lanzamiento: 2017, puntuacion: 10.0 },
    { nombre: "Dark Souls", genero: "RPG", lanzamiento: 2011, puntuacion: 9.5 },
    { nombre: "God of War", genero: "Acción/Aventura", lanzamiento: 2018, puntuacion: 9.9 },
    { nombre: "Overwatch", genero: "Shooter", lanzamiento: 2016, puntuacion: 9.2 },
    { nombre: "DOOM Eternal", genero: "Shooter", lanzamiento: 2020, puntuacion: 9.3 },
    { nombre: "Stardew Valley", genero: "Simulación", lanzamiento: 2016, puntuacion: 9.5 },
    { nombre: "Persona 5", genero: "JRPG", lanzamiento: 2016, puntuacion: 9.7 },
    { nombre: "Red Dead Redemption 2", genero: "Acción/Aventura", lanzamiento: 2018, puntuacion: 10.0 },
    { nombre: "Assassin's Creed Valhalla", genero: "Acción/Aventura", lanzamiento: 2020, puntuacion: 8.0 },
    { nombre: "Celeste", genero: "Plataforma", lanzamiento: 2018, puntuacion: 9.4 },
    { nombre: "Spider-Man", genero: "Acción/Aventura", lanzamiento: 2018, puntuacion: 9.1 },
    { nombre: "Fall Guys", genero: "Multijugador", lanzamiento: 2020, puntuacion: 8.5 },
    { nombre: "The Last of Us Part II", genero: "Acción/Aventura", lanzamiento: 2020, puntuacion: 9.5 },
    { nombre: "Ghost of Tsushima", genero: "Acción/Aventura", lanzamiento: 2020, puntuacion: 9.7 },
    { nombre: "Sekiro: Shadows Die Twice", genero: "Acción/Aventura", lanzamiento: 2019, puntuacion: 9.8 },
    { nombre: "Cuphead", genero: "Plataforma", lanzamiento: 2017, puntuacion: 8.8 },
    { nombre: "Final Fantasy VII Remake", genero: "JRPG", lanzamiento: 2020, puntuacion: 9.0 },
    { nombre: "Demon's Souls", genero: "RPG", lanzamiento: 2020, puntuacion: 9.2 },
    { nombre: "Among Us", genero: "Multijugador", lanzamiento: 2018, puntuacion: 8.7 },
    { nombre: "Monster Hunter: World", genero: "Acción/RPG", lanzamiento: 2018, puntuacion: 9.0 },
    { nombre: "Resident Evil 2", genero: "Survival Horror", lanzamiento: 2019, puntuacion: 9.5 },
    { nombre: "Control", genero: "Acción/Aventura", lanzamiento: 2019, puntuacion: 8.9 },
    { nombre: "Ori and the Will of the Wisps", genero: "Plataforma", lanzamiento: 2020, puntuacion: 9.2 },
    { nombre: "Hollow Knight", genero: "Metroidvania", lanzamiento: 2017, puntuacion: 9.4 },
    { nombre: "Death Stranding", genero: "Acción/Aventura", lanzamiento: 2019, puntuacion: 8.8 },
    { nombre: "Genshin Impact", genero: "Acción/RPG", lanzamiento: 2020, puntuacion: 9.1 },
    { nombre: "Final Fantasy XIV", genero: "MMORPG", lanzamiento: 2010, puntuacion: 9.0 },
    { nombre: "Warframe", genero: "Acción/MMO", lanzamiento: 2013, puntuacion: 8.5 }
];

// Añadir videojuego
export function agregarVideojuego(nombre, genero, lanzamiento, puntuacion) {
    videojuegos.push({ nombre, genero, lanzamiento, puntuacion });
    output.innerHTML += `Videojuego "${nombre}" añadido con éxito.<br> El juego añadido es: ${nombre} - Género: ${genero}, Año: ${lanzamiento}, Puntuación: ${puntuacion}<br>`;
}

// Eliminar videojuego por nombre
export function eliminarVideojuego(nombre) {
    const index = videojuegos.findIndex(vj => vj.nombre === nombre);
    if (index !== -1) {
        videojuegos.splice(index, 1);
        output.innerHTML += `Videojuego "${nombre}" eliminado con éxito.<br>`;
    } else {
        output.innerHTML += `Videojuego "${nombre}" no encontrado.<br>`;
    }
}

// Listar videojuegos
export function listarVideojuegos() {
    output.innerHTML = "<h3>Listado de Videojuegos</h3>";
    videojuegos.forEach(vj => {
        output.innerHTML += `${vj.nombre} - Género: ${vj.genero}, Año: ${vj.lanzamiento}, Puntuación: ${vj.puntuacion}<br>`;
    });
}

// Buscar videojuegos por género
export function buscarPorGenero(genero) {
    const filtrados = videojuegos.filter(vj => vj.genero === genero);
    if (filtrados.length > 0) {
        output.innerHTML = `<h3>Videojuegos del género: ${genero}</h3>`;
        filtrados.forEach(vj => {
            output.innerHTML += `${vj.nombre} - Año: ${vj.lanzamiento}, Puntuación: ${vj.puntuacion}<br>`;
        });
    } else {
        output.innerHTML += `No se encontraron videojuegos del género "${genero}".<br>`;
    }
}

// Ordenar videojuegos por puntuación
export function ordenarPorPuntuacion() {
    const ordenados = [...videojuegos].sort((a, b) => b.puntuacion - a.puntuacion);
    output.innerHTML = "<h3>Videojuegos ordenados por Puntuación</h3>";
    ordenados.forEach(vj => {
        output.innerHTML += `${vj.nombre} - Puntuación: ${vj.puntuacion}<br>`;
    });
}

// Filtrar videojuegos con puntuación mínima
export function filtrarPorPuntuacionMinima(minPuntuacion) {
    const filtrados = videojuegos.filter(vj => vj.puntuacion >= minPuntuacion);
    if (filtrados.length > 0) {
        output.innerHTML = `<h3>Videojuegos con puntuación mayor o igual a: ${minPuntuacion}</h3>`;
        filtrados.forEach(vj => {
            output.innerHTML += `${vj.nombre} - Puntuación: ${vj.puntuacion}<br>`;
        });
    } else {
        output.innerHTML += `No se encontraron videojuegos con una puntuación mayor o igual a ${minPuntuacion}.<br>`;
    }
}