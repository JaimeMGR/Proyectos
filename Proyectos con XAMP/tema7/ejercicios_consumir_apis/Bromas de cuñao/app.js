const url = 'https://icanhazdadjoke.com/';
const urlTraductor = 'https://api.mymemory.translated.net/get';
const button = document.querySelector('.btn');
const result = document.querySelector('.result');

// Función para obtener una broma aleatoria
async function ObtenerChistedeCuñao() {
  try {
    const respuesta = await fetch(url, {
      headers: {
        Accept: 'application/json',
      },
    });

    if (!respuesta.ok) {
      throw new Error('Error al obtener la broma');
    }

    const data = await respuesta.json();
    return data.joke;
  } catch (error) {
    console.error(error);
    return 'No se pudo obtener una broma en este momento.';
  }
}

// Función para traducir texto al español
async function TraducirAEspañol(text) {
  try {
    const respuesta = await fetch(`${urlTraductor}?q=${encodeURIComponent(text)}&langpair=en|es`);
    const data = await respuesta.json();
    return data.responseData.translatedText; // Traduce el chiste
  } catch (error) {
    console.error(error);
    return 'Error al traducir la broma.';
  }
}

// Función principal que combina ambas operaciones
async function mostrarbroma() {
  const BromaenIngles = await ObtenerChistedeCuñao();
  const BromaenEspañol = await TraducirAEspañol(BromaenIngles);

  result.innerHTML = `
    <p>${BromaenEspañol}</p>
  `;
}

// Asignar el evento al botón
button.addEventListener('click', mostrarbroma);
