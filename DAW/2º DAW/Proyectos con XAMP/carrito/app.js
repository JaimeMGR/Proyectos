"use strict"

let lista_carrito = []; //lista con lo que se añade al carrito
let lista_muebles; //lista completa de muebles
const alerta = document.querySelector(".alerta");


const carrito = document.querySelector(".cart-overlay");
const cerrar_carrito = document.querySelector(".cart-close");
const carrito_productos = document.querySelector(".cart-items");
const abrir_carrito = document.querySelector(".toggle-cart");

async function obtenerDatosApi(url_api) {
  const respuesta = await fetch(url_api);


  if (respuesta.ok) {
    lista_muebles = await respuesta.json();
    for (let mueble of lista_muebles) {
      contenedor.appendChild(crearMueble(mueble));
    }
  } else {
    let respuesta_error = await respuesta.josn();
    mostrarMensaje(respuesta_error.error,"danger");
  }
}


//NUEVO
//Aqui vamos a recuperar de la api la lista de productos y renderizarlos en la web
const contenedor = document.querySelector(".products-container");
obtenerDatosApi("muebles_api.php");
//==================FUNCIONES AUXILIARES=====================================================

//FUNCION DEL DOM Y EVENTOS PARA EL INTERFAZ DE LA TIENDA

function crearMueble(mueble) {
  //MUEBLE ES UN OBJETO CON ESTE FORMATO
  // {
  //   id: 'rec4f2RIftFCb7aHh',
  //   title: 'albany table',
  //   company: 'marcos',
  //   image:
  //     'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F01_albany_table.jpg?alt=media&token=fe8f3d8c-27ea-49fb-afbc-cd3a9fd5a07e',
  //   price: 79.99,
  // }

  let nuevo_mueble = document.createElement("article");

  nuevo_mueble.innerHTML = ` <article class="product">
        <div class="product-container" data-id="${mueble.id}">
          <img src="${mueble.image}" class="product-img img">
          <div class="product-icons">
            <button class="product-cart-btn product-icon">
              <i class="fas fa-shopping-cart"></i>
            </button>
          </div>
        </div>
        <footer>
          <p class="product-name">${mueble.title}</p>
          <h4 class="product-price">${mueble.price}</h4>
          <h4 class=".single-product-company">${mueble.company}</h4>
        </footer>
      </article>`;

  let boton_añadir = nuevo_mueble.querySelector(".product-cart-btn");
  boton_añadir.addEventListener('click',
    () => {

      lista_carrito.push(mueble);
      const nuevo_elemento = crearItemCarrito(mueble);
      carrito_productos.appendChild(nuevo_elemento);
      localStorage.setItem(carrito_local, JSON.stringify(lista_carrito));

      mostrarMensaje("Producto añadido al carrito", "success");
    });
  return nuevo_mueble;
}

//FUNCION DEL DOM Y EVENTOS PARA EL CARRITO

function crearItemCarrito(datos_item) {
  const nuevo_item = document.createElement('article');

  nuevo_item.classList.add('cart-item');
  nuevo_item.setAttribute('data-id', datos_item.id);
  nuevo_item.innerHTML = `
  <img src="${datos_item.image}"
            class="cart-item-img"
            alt="${datos_item.title}"
          />  
          <div>
            <h4 class="cart-item-name">${datos_item.title}</h4>
            <p class="cart-item-price">${datos_item.price}</p>
            <button class="cart-item-remove-btn" data-id="${datos_item.id}">Eliminar <i class="fas fa-times"></i></button>
          </div>`;

  const eliminar = nuevo_item.querySelector(".cart-item-remove-btn");
  eliminar.addEventListener("click",
    () => {
      const posicion = lista_carrito.findIndex(item => item["id"] == datos_item.id);
      lista_carrito.splice(posicion, 1);
      localStorage.setItem(carrito_local, JSON.stringify(lista_carrito));
      nuevo_item.remove();

    }
  );

  return nuevo_item;
}


function mostrarMensaje(texto, clase) {
  alerta.innerHTML = `<h3>${texto}</h3>`;

  alerta.classList.add(clase);
  // remove alert
  setTimeout(() => {
    alerta.innerText = "";
    alerta.classList.remove(clase);
  }, 2000);
}

//CODIGO PARA CARGAR LO QUE HAYA EN EL CARRITO 
const carrito_local = "carrito";

lista_carrito = JSON.parse(localStorage.getItem(carrito_local) ?? "[]");

carrito_productos.innerHTML = "";
lista_carrito.forEach((objeto) => {
  const producto = crearItemCarrito(objeto);
  carrito_productos.appendChild(producto);
});

//CODIGO PARA EL FUNCIONAMIENTO DEL CARRITO

abrir_carrito.addEventListener("click",
  () => {
    carrito.classList.add("show");
  });


cerrar_carrito.addEventListener("click",
  () => {
    carrito.classList.remove("show");
  });

