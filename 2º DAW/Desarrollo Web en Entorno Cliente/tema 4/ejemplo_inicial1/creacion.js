"use strict"
let franquicias = document.querySelectorAll("li");
franquicias.forEach(
    peli => {
        peli.addEventListener("click",
            () => {
                peli.before(crearNuevoLi("SuperRecursivo"));
            }
        )
    },
    peli => {
        peli.addEventListener("mouseenter",
            () => {
                peli.classList.add("item_activo");
            }
        )
    },
    peli => {
        peli.addEventListener("mouseleave",
            () => {
                peli.classList.remove("item_activo");
            }
        )
    }
)

let lista = document.querySelector(".container ul");

document.addEventListener("keypress",
    (e) => {
        let nuevo_li = document.createElement("li");
        nuevo_li.innerText = "Jurasic Park";
        nuevo_li.classList.add("item");

        switch (e.key) {
            case "i":
                lista.prepend(nuevo_li);
                break;
            case "f":
                lista.appendChild(nuevo_li);
                break;
        }
    }
)



function crearNuevoLi(texto) {
    let nuevo = document.createElement("li");
    nuevo.innerText = texto;
    nuevo.classList.add("item");

    nuevo.addEventListener("click",
        () => {
            nuevo.before(crearNuevoLi("Recursividad"));
        });

    nuevo.addEventListener("mouseenter",
        () => {
            nuevo.classList.add("item_activo");
        });

    nuevo.addEventListener("mouseleave",
        () => {
            nuevo.classList.remove("item_activo");
        });

    return nuevo;
}