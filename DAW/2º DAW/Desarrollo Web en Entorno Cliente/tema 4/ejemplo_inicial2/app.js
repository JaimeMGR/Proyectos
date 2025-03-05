"use strict"
let botones = document.querySelectorAll(".container button");

document.addEventListener("keypress",
    (e)=>{
        if(e.key==="Enter"){
            let nuevo_container=document.createElement("div");
            nuevo_container.classlist.add("container");
            nuevo_container.innerHTML =
            `
            <div class="boxes box-4">
                <h1 id="cabecera"> Ejemplo 1</h4>
                <button id="btn-4">Enter</button>
                <input id="inp-4" type="text" placeholder="Texto">
                <img class="foto marco" src="encendida.gif" id="im4" alt="bombilla">
            </div>
            `;

            let boton=nuevo_container.querySelector("button");
            boton.addEventListener("click",
                () => {
                let input = boton.nextElementSibling;
                let imagen = input.nextElementSibling;
                let url = input.value;
                imagen.setAttribute("src", url);
                }
            )
            document.body.appendChild(nuevo_container);
        }
    }
)

botones.forEach(
    (boton) => {
        boton.addEventListener("click",
            () => {
                let input = boton.nextElementSibling;
                let imagen = input.nextElementSibling;
                let url = input.value;
                imagen.setAttribute("src", url);
            }
        )
    }
)
