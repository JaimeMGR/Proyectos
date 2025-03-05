"use strict"



const form = document.querySelector(".lista-form");
const alert = document.querySelector(".alert");
const contenido = document.getElementById("contenido");
const btn_enviar = document.querySelector(".submit-btn");
const lista_html = document.querySelector(".lista-list");
const btn_borrar_todo = document.querySelector(".clear-btn");


let lista_tareas = [];

function guardarTareas(nombre_almacen){
    localStorage.setItem(nombre_almacen, JSON.stringify(lista_tareas));
}


function recuperarTareas(nombre_almacen){
    return JSON.parse(localStorage.getitem(lista_tareas));
}

s


function mostrarMensaje(texto, clase) {
    alert.innerText = texto;
    alert.classList.add(clase);
    btn_enviar.setAttribute("disabled", "disabled");
    setTimeout(() => {
        alert.innerText = "";
        alert.classList.remove(clase);
        btn_enviar.removeAttribute("disabled");
    }, 4000);
}

let lista_tareas = recuperarTareas("almacen");




form.addEventListener("submit",
    (evento) => {
        evento.preventDefault();
        const valor = contenido.value.trim();
        
        //Comprobar que el usuario introudzca algo diferente a cadena vacia
        if(valor === ""){
            mostrarMensaje("Introduce la tarea", "danger");
        } else {
            //Para el localStorage
            let datos_tarea = {
                                "titulo": valor,
                                "completada": false,
                                "id": new Date().getTime().toString()
            }
            lista_tareas.push(datos_tarea); 

            guardarTareas(almacen);




            //Para el frontend
            let nueva_tarea = document.createElement("article");
            nueva_tarea.classList.add("lista-item");
            nueva_tarea.innerHTML = `<p class="title">${valor}</p>
                                        <div class="btn-container">
                                            <button type="button" class="terminado-btn">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                            <button type="button" class="borrar-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>`;



            let boton_borrar = nueva_tarea.querySelector(".borrar-btn");
            boton_borrar.addEventListener("click",
                () => {
                    boton_borrar.parentNode.parentNode.remove();
                    mostrarMensaje("Tarea borrada", "success");
                    //tambien seriviría boton_borrar.remove(), pero mejor la otra.
                }
            )



            let boton_completar = nueva_tarea.querySelector(".terminado-btn");

            boton_completar.addEventListener("click",
                () => {
                    if(boton_completar.parentNode.parentNode.firstChild.classList.contains("tachado")){//Podría servir también con  boton_completar.parentNode.previousElementSibling;
                        boton_completar.parentNode.parentNode.firstChild.classList.remove("tachado");

                        //ALTERNATIVAS
                        mostrarMensaje("Deshacer", "success");
                   } else {
                        boton_completar.parentNode.parentNode.firstChild.classList.add("tachado");
                        mostrarMensaje("Tarea completada", "success");
                }
                    
                }
            )

            lista_html.appendChild(nueva_tarea);
            mostrarMensaje("Tarea añadida con éxito", "success");
            form.reset(); //Limpia el formulario cuando envío.
        }

        
    });

btn_borrar_todo.addEventListener("click",
    () => {
        lista_html.innerHTML="";
        mostrarMensaje("Lista de tareas vaciada", "success");
        
    });




/*
`<p class="title">${valor}</p>
                                        <div class="btn-container">
                                            <button type="button" class="terminado-btn">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                            <button type="button" class="borrar-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>`
*/