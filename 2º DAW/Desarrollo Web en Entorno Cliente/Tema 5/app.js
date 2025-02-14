"use strict";
 
let formulario = document.getElementById("miFormulario");
 
 
let campoTexto = document.getElementById('miCampoTexto');
let checkbox = document.getElementById('miCheckbox');
let select = document.getElementById('miSelect');
let numero = document.getElementById("numberField");
let input_ficheros = document.getElementById("fileInput");

campoTexto.addEventListener("Input",
  ()=>{
    validarNombre();
  }
)

numero.addEventListener("input",
  ()=>{
    validarNumero();
  }
)

checkbox.addEventListener("change",
  ()=>{
    validarCheckbox();
  }
)
 
 
 
const validarTexto = () => {
   
    let span_error = campoTexto.nextElementSibling;
 
    if (campoTexto.value.trim() === "") {
        span_error.style.display ="inline";
        span_error.innerHTML = "El campo nombre no puede estar vacío.";
     
      return false;
    }
    span_error.style.display ="none";
    return true;
  };
 
 
  const validarCheckbox = () => {
   
    let span_error = checkbox.parentNode.nextElementSibling;
    if (!checkbox.checked) {
        span_error.style.display="inline";
      span_error.innerHTML = "Debe aceptar los términos.";
      return false;
    }
    span_error.style.display="none";
    return true;
  };
 
 
 
formulario.addEventListener("submit",
    (evento) => {
        for(let validar of validaciones){
        if(!validar()){
            evento.preventDefault();
           
        }
        }
       
        //if(!validarTexto() || !validarCheckbox() || !validarSelect() || !validarNumero() || !validarFichero()) {
        //evento.preventDefault();
       
    });
 
const validarSelect = () => {
   
    let span_error = select.nextElementSibling;
    if (select.selectedIndex===0){
        span_error.style.display="inline";
        span_error.innerHTML = "Debe seleccionar una opción.";
        return false;
    }
    span_error.style.display="none";
    return true;
 
}
 
const validarNumero = () =>{
 
    let valor_numero = parseInt(numero.value.trim());
    let span_error = numero.nextElementSibling;
    if(isNaN(valor_numero)){
        span_error.style.display="inline";
        span_error.innerHTML = "Debe introducir solo números.";
        return false;
    }
 
    if(valor_numero<1 || valor_numero>100){
        span_error.style.display="inline";
        span_error.innerHTML = "El número debe estar entre 0 y 100.";
        return false;
    }
    span_error.style.display="none";
    return true;
}
 
const validarFichero = ()=>{
 
    let fichero;
    let span_error = input_ficheros.nextElementSibling;
    const tipos_admitidos = ["image/jpeg", "image/png"];
 
    if(input_ficheros.files.length>0){
 
        fichero=input_ficheros.files[0];
 
        if(!tipos_admitidos.includes(fichero.type)){
            span_error.style.display="inline";
            span_error.innerHTML = "Debe seleccionar un fichero con extensión JPEG o PNG";
            return false;
        }
 
        if(fichero.size>2000000){
            span_error.style.display="inline";
            span_error.innerHTML = "El tamaño del fichero es demasiado grande. Debe ser menor de 2MB";
            return false;
        }
 
        span_error.style.display="none";
        return true;
    }else{
        span_error.style.display="inline";
        span_error.innerHTML = "Debes seleccionar un archivo";
        return false;
    }
 
}
 
let validaciones = [validarTexto, validarCheckbox,  validarSelect, validarNumero, validarFichero];