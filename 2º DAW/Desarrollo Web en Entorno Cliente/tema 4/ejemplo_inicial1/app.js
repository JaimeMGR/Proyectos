"use strict";

let datos = {
    "Matrix": {
        "titulo": "The Matrix",
        "peliculas": 4,
        "imagen": "./imagenes/matrix.jpg"
    },
    "StarWars": {
        "titulo": "Star Wars",
        "peliculas": 9,
        "imagen": "./imagenes/Star_Wars_Logo.svg"
    },
    "Harry": {
        "titulo": "Harry Potter",
        "peliculas": 8,
        "imagen": "./imagenes/Harry_Potter_wordmark.svg"
    },
    "ESDLA": {
        "titulo": "El Señor de los Anillos",
        "peliculas": 6,
        "imagen": "./imagenes/One_ring.png"
    },
    "Marvel": {
        "titulo": "Marvel",
        "peliculas": 32,
        "imagen": "./imagenes/Marvel_Logo.svg"
    } 
}

let franquicias = document.querySelectorAll("li");
franquicias.forEach(elemento_li =>
{


    elemento_li.addEventListener("contextmenu",
        (evento) => {
            //Evitamos que salga el menu contextual del boton derecho
            evento.preventDefault();
            let clave = elemento_li.getAttribute("data-peli");
            //Se podría acceder elemento_li.dataset.visto, y acceder a el mediante métodos,
            //  pero si no encuentra visto, saldrá undefined. A Dani no le gusta, prefiere
            //  el getAttribute y setAttribute
            if(elemento_li.getAttribute("data-visto") === null){
                elemento_li.innerHTML = `${datos[clave]["titulo"]}
                    <img width = '100px' src = '${datos[clave]["imagen"]}'>
                    Tiene ${datos[clave]["peliculas"]} películas`;

                elemento_li.setAttribute("data-visto", "si");

            }else {
                //Creamos en el html el data-peli para guardar el value del texto, para que a la hora de
                //  clicar sobre uno concreto, nos devuelva el título que ténia antes (que es el que almacenamos
                //  en el atributo que metemos. Mira el html.)
                elemento_li.innerHTML = datos[clave]["titulo"];
                elemento_li.removeAttribute("data-visto");
            }
            
        }
    )


    elemento_li.addEventListener("click",
        () => {
//Si no tiene el atributo "visto" en el html, devolverá null
//De esta forma, creamos un atributo inventado, y lo controlamos
//  Se le añade el atributo visto al clicar, y se tacha, y luego,
//      si está en visto, y hacemos clic, lo establece en none, y le quita el visto (se quedaría en null)
//      para evitar que el atributo inventado, en un futuro sea hecho "reservado" por html, se pone el estandar:
//      "data-nombre_atributo"
            if(elemento_li.getAttribute("data-visto") === null){
                elemento_li.style.textDecoration = "line-through";
                elemento_li.setAttribute("data-visto", "si");

            }else {
                elemento_li.style.textDecoration = "none";
                elemento_li.removeAttribute("data-visto");
            }







            // if(elemento_li.style.textDecoration === "line-through"){
            //     elemento_li.style.textDecoration = "none";
            // } else {
            //     elemento_li.style.textDecoration = "line-through";
            // }
            
            
        }
    );
    
    elemento_li.addEventListener("mouseenter",
        () => {
            //El que este comentado funcione es porque está puesto !important.
            //elemento_li.classList.remove("item");
            elemento_li.classList.add("item_activo");
        }
    );
    //Si hay varios eventos con la misma acción, no son incompatibles, te los hace todos
    elemento_li.addEventListener("mouseleave",
        () =>{
            elemento_li.classList.remove("item_activo");
            //elemento_li.classList.add("item");
            //ESto funciona porque tenemos puesto el !important
        }
    );
}
)
























//=================TODAS LAS FORMAS POSIBLES DE SLECCIONAR ELEMENTOS
//Utilizo querySelector solo para cuando quiero un elemento
//let contendor = document.querySelector(".container");
// let contenedor = document.querySelector("div");
// contendor.style.border = "10px solid yellow";

//let h1 = document.querySelector("h1");
//let h1 = document.querySelector("#cabecera")

//Recomienda que si es un id usemos el getElementById
//Dice que los id son para JavaScript, y las clases para css, por tanto, aprovechar
//  el getElementById
// let h1 = document.getElementById("cabecera");
// let h1_otraforma = document.querySelector("div.container h1");
// h1.innerHTML = "Sagas de <em>éxito</em>";
// h1_otraforma.innerHTML = "Sagas de <b>éxito</b>";


// let franquicias = document.querySelectorAll(".item");
// franquicias.forEach(li => {
//     li.style.textDecoration = "underline";
//     li.classList.remove("item")
//     li.classList.add("item_activo");
// })

//MOVERSE POR EL DOM
// contenedor.children[0].innerHTML = "Sagas de <em>éxito</em>"; //Este es el h1
// contenedor.children[1].style.border = "13px dotted orange"; //Este es el ul


// //OJO. Mira esta peculiaridad, children es un array antiguo que no admite forEach.
// for(let elemento_li of contenedor.children[1].children){
//     elemento_li.style.textDecoration = "underline";
//     elemento_li.classList.remove("item")
//     elemento_li.classList.add("item_activo");
    
// };

// //Ahora vamos hacia arriba.
// contenedor.parentNode.style.background="hotpink"; //Estamos en el body

// //Vovler al origen, no sirve de nada.
// contenedor.children[1].children[0].parentNode.parentNode

// //OJO a nextElementSibling, nos lleva al siguiente hermano por la derecha.
// //  También está el nextSibling, pero solo hace referencia al nodo, y no dejará
// //      tocar las propiedades tipo style, etc.
// contenedor.children[0].nextElementSibling.style.border="2px solid red"; //Iremos al ul
// contenedor.children[1].previousElementSibling.innerText="Hermano"; //Iremos al h1



