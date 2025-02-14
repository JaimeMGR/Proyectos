"use strict";

const alerta = document.querySelector(".alerta");
const contenedor_productos = document.querySelector(".products-container");
const precioapagar = document.querySelector(".total-price");

const carrito = document.querySelector(".cart-overlay");
const cerrar_carrito = document.querySelector(".cart-close");
const carrito_aside = document.querySelector("aside.cart");
const carrito_productos = document.querySelector(".cart-items");
const abrir_carrito = document.querySelector(".toggle-cart");
const vaciarcarrobtn = document.querySelector(".cart-checkout");
let preciototal = 0;

document.addEventListener("click", () => {
  carrito.classList.remove("show");

});

carrito_aside.addEventListener("click", (evento) => {
  evento.stopPropagation();
});

abrir_carrito.addEventListener("click", (evento) => {
  evento.stopPropagation();
  carrito.classList.add("show");
});

cerrar_carrito.addEventListener("click", () => {
  carrito.classList.remove("show");
});


const carrito_local = "carrito";
//RENDERIZAR EL LOCALSTORAGE DEL CARRITO

let lista_carrito = JSON.parse(localStorage.getItem(carrito_local)) ?? [];

for (let item of lista_carrito) {
  carrito_productos.appendChild(crearItemCarrito(item));
}


//==================FUNCIONES AUXILIARES=====================================================

function crearItemCarrito(datos_item) {
  const nuevo_item = document.createElement("article");

  nuevo_item.classList.add("cart-item");
  nuevo_item.setAttribute("data-id", datos_item.id);
  preciototal = preciototal + datos_item.price;
  nuevo_item.innerHTML = `
  <img src="${datos_item.image}"
            class="cart-item-img"
            alt="${datos_item.title}"
          />  
          <div>
            <h4 class="cart-item-name">${datos_item.title}</h4>
            <p class="cart-item-price">${datos_item.price + " €"}</p>
            <button class="cart-item-remove-btn" data-id="${datos_item.id}">Eliminar <i class="fas fa-times"></i></button>
          </div>`;
  mostrarPrecioTotal(preciototal);
  //BOTON DE ELIMINAR 
  let boton_eliminar = nuevo_item.querySelector(".cart-item-remove-btn");
  boton_eliminar.addEventListener("click",
    () => {
      preciototal = preciototal - datos_item.price;
      mostrarPrecioTotal(preciototal);
      let posicion = lista_carrito.findIndex(item => item["id"] === datos_item["id"]);
      lista_carrito.splice(posicion, 1);

      localStorage.setItem(carrito_local, JSON.stringify(lista_carrito));

      nuevo_item.remove();

      mostrarMensaje("Producto eliminado del carrito", "danger");
    }
  );
  return nuevo_item;


  
}


vaciarcarrobtn.addEventListener("click",() => {
  lista_carrito = [];
  // Ahora se vacía el contenido del carrito_productos
  carrito_productos.innerHTML = "";

  // y se reinicia el precio total
  preciototal = 0;
  mostrarPrecioTotal(preciototal);

  mostrarMensaje("Se ha vaciado el carrito", "success");
});

const añadir_carrito = document.querySelectorAll(".product-cart-btn");
for (let carrito_boton of añadir_carrito) {
  //EVENTO CLICK DEL BOTON AÑADIR AL CARRITO DE CADA PRODUCTO
  carrito_boton.addEventListener("click",
    () => {
      let id_producto = carrito_boton.parentNode.parentNode.getAttribute("data-id");
      let seleccionado = lista[id_producto];

      let nuevo_item = crearItemCarrito(seleccionado);
      carrito_productos.appendChild(nuevo_item);

      lista_carrito.push(seleccionado);

      localStorage.setItem(carrito_local, JSON.stringify(lista_carrito));


      mostrarMensaje("Producto añadido al carrito", "success");
    }
  )
}

function mostrarPrecioTotal($preciototal) {
  precioapagar.innerHTML = `<h3>${$preciototal + " €"}</h3>`;
}

function mostrarMensaje(texto, clase) {
  alerta.innerHTML = `<h3>${texto}</h3>`;

  alerta.classList.add(clase);
  // remove alert
  setTimeout(() => {
    alerta.innerText = "";
    alerta.classList.remove(clase);
  }, 1000);
}
