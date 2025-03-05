// Función para crear una fila de la tabla
document.addEventListener('DOMContentLoaded', () => {
  const cantidadSelect = document.getElementById('cantidad');
  const generoSelect = document.getElementById('genero');
  const nacionalidadSelect = document.getElementById('nacionalidad');
  const buscarButton = document.getElementById('buscar');
  const listaApi = document.getElementById('lista_api');
  const cargando = document.getElementById('cargando');

  cargando.style.display = 'none'; // Ocultar indicador de carga inicialmente

  buscarButton.addEventListener('click', async () => {
    // Mostrar indicador de carga
    cargando.style.display = 'block';

    // Limpiar tabla existente
    listaApi.innerHTML = '';

    // Obtener parámetros seleccionados
    const cantidad = cantidadSelect.value;
    const genero = generoSelect.value;
    const nacionalidad = nacionalidadSelect.value;

    // Construir URL de la API
    const url = `https://randomuser.me/api/?results=${cantidad}&gender=${genero}&nat=${nacionalidad}`;

    try {
      // Llamar a la API
      const response = await fetch(url);

      if (!response.ok) {
        throw new Error('Error al obtener los usuarios.');
      }

      const data = await response.json();

      // Procesar los resultados
      data.results.forEach((usuario) => {
        const nombre = `${usuario.name.first} ${usuario.name.last}`;
        const email = usuario.email;
        const edad = usuario.dob.age;
        const genero = usuario.gender;
        const urlImagen = usuario.picture.thumbnail;

        console.log(edad);

        // Crear y agregar fila a la tabla
        const fila = crearFila(nombre, email, edad, genero, urlImagen);
        listaApi.appendChild(fila);
      });
    } catch (error) {
      console.error(error);
      alert('Hubo un error al obtener los datos. Inténtalo de nuevo más tarde.');
    } finally {
      // Ocultar indicador de carga
      cargando.style.display = 'none';
    }
  });


});

function crearFila(nombre, email, edad, genero, urlImagen) {
  const fila = document.createElement('tr');

  const tdNombre = document.createElement('td');
  tdNombre.textContent = nombre;

  const tdGenero = document.createElement('td');
  tdGenero.textContent = genero;

  const tdEmail = document.createElement('td');
  tdEmail.textContent = email;

  const tdEdad = document.createElement('td');
  tdEdad.textContent = edad;



  const tdImagen = document.createElement('td');
  const imagen = document.createElement('img');
  imagen.src = urlImagen;
  imagen.alt = 'Foto de usuario';
  imagen.style.width = '50px';
  tdImagen.appendChild(imagen);

  fila.appendChild(tdNombre);
  fila.appendChild(tdGenero);
  fila.appendChild(tdEmail);
  fila.appendChild(tdEdad);
  fila.appendChild(tdImagen);

  return fila;
}
