"use strict"

// localStorage.getItem("nombre","Pepe");
alert(localStorage.getItem("nombre"));
alert(localStorage.length);


// 
let datos=[];

const form=document.getElementById("formu");
const nombre=document.getElementById("nom");
const apellidos=document.getElementById("ape");
const edad=document.getElementById("edad");

const boton=document.getElementById("guardar");
const div_info=document.getElementById("info");

form.addEventListener("submit",
    (evento) => {
        evento.preventDefault();
        let valor_nombre=nombre.value.trim();
        let valor_apellidos=apellidos.value.trim();
        let valor_edad=parseInt(edad.value.trim());

        localStorage.setItem("nombre","");
        
        let nueva_persona={
            "nombre":valor_nombre,
            "apellidos":valor_apellidos,
            "edad":valor_edad
        }

        datos.push(nueva_persona);

        localStorage.setItem("almacen",JSON.stringify(datos));


        for(persona of datos){
            for(atributos in persona){
                div_info.innerHTML+=`<h4>${atributos}:${persona[atributos]}</h4>`;
            }
        }

        form.reset();
    });

