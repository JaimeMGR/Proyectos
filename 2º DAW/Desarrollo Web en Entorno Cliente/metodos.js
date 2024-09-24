"use strict"

alert("Hola mundo");
let respuesta=confirm("¿Aceptas darme todo tu dinero?");
document.write("<h1>Tu respuesta ha sido:"+respuesta+"</h1>");

let dinero=prompt("¿Cuánto dinero tienes?")
dinero+=100;
document.write("<h1>Dinero:"+dinero+"€</h1>");

let lenguajes=["HTML","CSS","JAVASCRIPT","PHP"];

for(let i=0;i<lenguajes.length;i++){
    document.write(`<button>${lenguajes[i]}</button>`)
}

for(let item of lenguajes){
    document.write(`<button>${item}</button>`)
}
