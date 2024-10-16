"use strict"

function accion(){
    document.write="Titulo modificado con Javascript";
    document.body.style.background="lightgreen";
}

document.addEventListener("click", accion);


document.addEventListener("click", 
    () => {
        document.write="Título modificado con arrow function";
        document.body.style.background="lightblue";
        let div_caja = document.getElementById("caja");
        div_caja.innerHTML += "<img width='200px' src='encendida.gif'>";
    }
);

let primera=document.getElementById("primera");
primera.src="encendida.gif"
primera.style.width="200px";
primera.style.border="5px dashed blue";

let titulo=document.querySelector("h1")
titulo.style.background="pink";
titulo.classList.add=("borde_verde");
titulo.innerHTML="Ejemplo de <em>DWEC</em>";




let div_caja=document.getElementById("caja")
div_caja.innerHTML="<img src='encendida.gif'>"