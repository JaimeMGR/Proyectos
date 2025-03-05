// app.js

function crearFila(titulo, año, tipo, poster) {
    const fila = document.createElement("tr");
  
    const td_titulo = document.createElement("td");
    td_titulo.classList.add("text-center");
    td_titulo.innerText = titulo;
  
    const td_año = document.createElement("td");
    td_año.classList.add("text-center");
    td_año.innerText = año;
  
    const td_tipo = document.createElement("td");
    td_tipo.classList.add("text-center");
    td_tipo.innerText = tipo;
  
    const imagen = document.createElement("img");
    imagen.src = poster;
    imagen.alt = "Poster no disponible";
    imagen.style.width = "100px"; // Ajusta el tamaño de la imagen
  
    const td_poster = document.createElement("td");
    td_poster.classList.add("text-center");
    td_poster.appendChild(imagen);
  
    fila.appendChild(td_titulo);
    fila.appendChild(td_año);
    fila.appendChild(td_tipo);
    fila.appendChild(td_poster);
  
    return fila;
  }
  
  document.addEventListener("DOMContentLoaded", () => {
    const API_KEY = "b76b385c"; // Tu API Key de OMDB
    const baseURL = "https://www.omdbapi.com/";
    const peliculaInput = document.getElementById("pelicula");
    const buscarBtn = document.getElementById("buscar");
    const contenedorApi = document.getElementById("contenedor_api");
    const cargando = document.getElementById("cargando");
  
    cargando.style.display = "none";
  
    async function obtenerPeliculas(pelicula) {
      cargando.style.display = "block";
      contenedorApi.innerHTML = ""; // Limpiar resultados anteriores
  
      try {
        const respuesta = await fetch(`${baseURL}?s=${pelicula}&apikey=${API_KEY}&type=movie`);
        if (!respuesta.ok) {
          throw new Error(`Error: ${respuesta.status} - ${respuesta.statusText}`);
        }
  
        const datos = await respuesta.json();
  
        if (datos.Response === "False") {
          alert("No se encontraron resultados.");
          return;
        }
  
        // Iterar sobre los resultados y crear filas
        datos.Search.forEach(pelicula => {
          const fila = crearFila(pelicula.Title, pelicula.Year, pelicula.Type, pelicula.Poster);
          contenedorApi.appendChild(fila);
        });
      } catch (error) {
        alert("Hubo un error al obtener los datos: " + error.message);
      } finally {
        cargando.style.display = "none"; // Oculta el indicador de carga
      }
    }
  
    // Usar el botón buscar
    buscarBtn.addEventListener("click", () => {
      const pelicula = peliculaInput.value.trim();
      if (pelicula) {
        obtenerPeliculas(pelicula);
      } else {
        alert("Por favor, ingresa un título de película.");
      }
    });
  });