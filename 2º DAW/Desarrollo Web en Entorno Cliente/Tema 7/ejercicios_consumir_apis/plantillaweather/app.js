
//http://api.weatherapi.com/v1/current.json?key=027e499e71bf4031b73155522211901&q=Granada

function crearFila(region, ciudadDato, humedad, temperatura, icono) {
  const fila = document.createElement("tr");

  const td_ciudad = document.createElement("td");
  td_ciudad.classList.add("text-center");
  td_ciudad.innerText = ciudadDato + ", " + region;

  const td_humedad = document.createElement("td");
  td_humedad.classList.add("text-center");
  td_humedad.innerText = humedad + "%";

  const td_temperatura = document.createElement("td");
  td_temperatura.classList.add("text-center");
  td_temperatura.innerText = temperatura + "ºC";

  const imagen = document.createElement("img");
  imagen.src = icono;

  const td_icono = document.createElement("td");
  td_icono.classList.add("text-center");
  td_icono.appendChild(imagen);

  fila.appendChild(td_ciudad);
  fila.appendChild(td_humedad);
  fila.appendChild(td_temperatura);
  fila.appendChild(td_icono);

  return fila;
}

document.addEventListener("DOMContentLoaded", () => {
  const API_KEY = "027e499e71bf4031b73155522211901";
  const baseURL = "http://api.weatherapi.com/v1/current.json";
  const ciudadInput = document.getElementById("ciudad");
  const buscarBtn = document.getElementById("buscar");
  const tiempoApi = document.getElementById("tiempo_api");
  const cargando = document.getElementById("cargando");


  cargando.style.display = "none";


  async function obtenerClima(ciudad) {
    cargando.style.display = "block";

    try {
      const respuesta = await fetch(`${baseURL}?key=${API_KEY}&q=${ciudad}&lang=es`);
      if (!respuesta.ok) {
        throw new Error(`Error: ${respuesta.status} - ${respuesta.statusText}`);
      }

      const datos = await respuesta.json();

      // Extrae los datos necesarios
      const region = datos.location.region;
      const ciudadDato = datos.location.name;
      const humedad = datos.current.humidity;
      const temperatura = datos.current.temp_c;
      const icono = datos.current.condition.icon;

      // Crea y agrega la fila a la tabla
      const fila = crearFila(region, ciudadDato, humedad, temperatura, icono);
      tiempoApi.appendChild(fila);
    } catch (error) {
      alert("Hubo un error al obtener los datos: " + error.message);
    } finally {
      cargando.style.display = "none"; // Oculta el indicador de carga
    }
  }

  // Usar el botón buscar
  buscarBtn.addEventListener("click", () => {
    const ciudad = ciudadInput.value.trim();
    if (ciudad) {
      obtenerClima(ciudad);
    } else {
      alert("Por favor, ingresa una ciudad.");
    }
  });


});



