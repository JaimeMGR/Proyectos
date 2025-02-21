document.addEventListener("DOMContentLoaded", () => {
    const API_URL = "https://api.imgflip.com/get_memes";
    const urlTraductor = "https://api.mymemory.translated.net/get"; // API de traducción
    const contenedorApi = document.getElementById("contenedor_api");
    const cargando = document.getElementById("cargando");
    const buscarMemeBtn = document.getElementById("meme");
    const aleatorioBtn = document.getElementById("ale");
    const busquedaInput = document.getElementById("busqueda");

    let memes = []; // Almacenará la lista de memes

    cargando.style.display = "none";

    // Función para obtener los memes desde la API
    async function obtenerMemes() {
        cargando.style.display = "block";
        try {
            const respuesta = await fetch(API_URL);
            if (!respuesta.ok) {
                throw new Error(`Error: ${respuesta.status} - ${respuesta.statusText}`);
            }
            const datos = await respuesta.json();
            memes = datos.data.memes; // Almacenamos los memes en la variable
            return memes;
        } catch (error) {
            alert("Hubo un error al obtener los memes: " + error.message);
        } finally {
            cargando.style.display = "none";
        }
    }

    // Función para traducir texto al español
    async function TraducirAEspanol(text) {
        try {
            const respuesta = await fetch(`${urlTraductor}?q=${encodeURIComponent(text)}&langpair=en|es`);
            const data = await respuesta.json();
            return data.responseData.translatedText; // Devuelve el texto traducido
        } catch (error) {
            console.error(error);
            return text; // Si hay un error, devuelve el texto original
        }
    }

    // Función para crear una fila en la tabla
    async function crearFila(nombreOriginal, imagenUrl) {
        const fila = document.createElement("tr");

        const tdNombreOriginal = document.createElement("td");
        tdNombreOriginal.innerText = nombreOriginal;

        // Traducir el nombre del meme al español
        const nombreTraducido = await TraducirAEspanol(nombreOriginal);
        const tdNombreTraducido = document.createElement("td");
        tdNombreTraducido.innerText = nombreTraducido;

        const imagen = document.createElement("img");
        imagen.src = imagenUrl;
        imagen.style.maxWidth = "100px"; // Ajustar el tamaño de la imagen

        const tdImagen = document.createElement("td");
        tdImagen.appendChild(imagen);

        fila.appendChild(tdNombreOriginal);
        fila.appendChild(tdNombreTraducido);
        fila.appendChild(tdImagen);

        return fila;
    }

    // Función para mostrar los memes en la tabla
    async function mostrarMemes(memes) {
        contenedorApi.innerHTML = ""; // Limpiar la tabla antes de agregar nuevos memes
        for (const meme of memes) {
            const fila = await crearFila(meme.name, meme.url); // Crear fila con traducción
            contenedorApi.appendChild(fila);
        }
    }

    // Función para buscar memes por nombre
    function buscarMemes(termino) {
        const memesFiltrados = memes.filter(meme =>
            meme.name.toLowerCase().includes(termino.toLowerCase())
        );
        mostrarMemes(memesFiltrados);
    }

    // Función para seleccionar un meme aleatorio
    async function seleccionarMemeAleatorio() {
        if (memes.length > 0) {
            const memeAleatorio = memes[Math.floor(Math.random() * memes.length)];
            await mostrarMemes([memeAleatorio]); // Mostrar solo el meme aleatorio
        } else {
            alert("No hay memes disponibles.");
        }
    }

    // Cargar los memes al iniciar la página
    obtenerMemes().then(memes => {
        if (memes) {
            mostrarMemes(memes); // Mostrar todos los memes al cargar la página
        }
    });

    // Evento para buscar memes
    buscarMemeBtn.addEventListener("click", () => {
        const termino = busquedaInput.value.trim();
        if (termino) {
            buscarMemes(termino);
        } else {
            alert("Por favor, ingresa un término de búsqueda.");
        }
    });

    // Evento para seleccionar un meme aleatorio
    aleatorioBtn.addEventListener("click", seleccionarMemeAleatorio);
});