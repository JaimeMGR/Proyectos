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

// Listar videojuegos
export function listarVideojuegos() {
    console.log("Listado de Videojuegos:");
    videojuegos.forEach(videojuego => {
        console.log(`${videojuego.nombre} - Género: ${videojuego.genero}, Año: ${videojuego.lanzamiento}, Puntuación: ${videojuego.puntuacion}`);
    });
}

// Añadir videojuego
export function agregarVideojuego(nombre, genero, lanzamiento, puntuacion) {
    videojuegos.push({ nombre, genero, lanzamiento, puntuacion });
    console.log(`Videojuego "${nombre}" añadido con éxito.`);
}

// Eliminar videojuego por nombre
export function eliminarVideojuego(nombre) {
    const index = videojuegos.findIndex(videojuego => videojuego.nombre === nombre);
    if (index !== -1) {
        videojuegos.splice(index, 1);
        console.log(`Videojuego "${nombre}" eliminado con éxito.`);
    } else {
        console.log(`Videojuego "${nombre}" no encontrado.`);
    }
}

// Buscar videojuegos por género
export function buscarPorGenero(genero) {
    const filtrados = videojuegos.filter(videojuego => videojuego.genero === genero);
    if (filtrados.length > 0) {
        console.log(`Videojuegos del género: ${genero}`);
        filtrados.forEach(videojuego => {
            console.log(`${videojuego.nombre} - Año: ${videojuego.lanzamiento}, Puntuación: ${videojuego.puntuacion}`);
        });
    } else {
        console.log(`No se encontraron videojuegos del género "${genero}".`);
    }
}

// Ordenar videojuegos por puntuación
export function ordenarPorPuntuacion() {
    const ordenados = [...videojuegos].sort((a, b) => b.puntuacion - a.puntuacion);
    console.log("Videojuegos ordenados por Puntuación:");
    ordenados.forEach(videojuego => {
        console.log(`${videojuego.nombre} - Puntuación: ${videojuego.puntuacion}`);
    });
}

// Filtrar videojuegos con puntuación mínima
export function filtrarPorPuntuacionMinima(minPuntuacion) {
    const filtrados = videojuegos.filter(videojuego => videojuego.puntuacion >= minPuntuacion);
    if (filtrados.length > 0) {
        console.log(`Videojuegos con puntuación mayor o igual a: ${minPuntuacion}`);
        filtrados.forEach(videojuego => {
            console.log(`${videojuego.nombre} - Puntuación: ${videojuego.puntuacion}`);
        });
    } else {
        console.log(`No se encontraron videojuegos con una puntuación mayor o igual a ${minPuntuacion}.`);
    }
}