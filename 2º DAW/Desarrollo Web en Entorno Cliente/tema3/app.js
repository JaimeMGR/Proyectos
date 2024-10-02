"use strict"

// // EJERCICIO 1
console.log("Ejercicio 1:");
let busqueda="the";

let filtro_titulo=tienda.filter(
    (disco)=>{disco["titulo"].includes(busqueda.toLowerCase())
    }
);
console.log(filtro_titulo);

let pais="ESP";

let filtro_pais=tienda.filter((disco)=>disco["pais"]===pais)
    .sort((a,b)=>a["copias"]-b["copias"]);

console.log(filtro_pais);

tienda.sort((a,b)=>b["publicación"]-a["publicación"]);
console.log(tienda[0]);

let paises=[];
tienda.forEach(disco => {
    if(!paises.includes(disco["pais"])){
         paises.push(disco["pais"]);
}});
console.log(paises);

let numeros=[1,2,3,5,6,7,8,6,9,7,2];

let sinrepes=numeros.filter(
     (numero, posicion) => numeros.indexOf(numero) === posicion);

console.log(sinrepes);





let recaudacion={};//NOMBRE DEL PAIS ES LA CLAVE
tienda.forEach(disco => {
    recaudacion[disco["pais"]]??=0;
    recaudacion[disco["pais"]]+=disco["copias"]*1000*disco["precio"];
})

console.log(recaudacion);


//EJERCICIO 2
console.log("Ejercicio 2:");
//Buscar un plato a partir del nombre el cual es macarrones con chorizo

let filtro_plato=tienda.filter(
    (menu)=>{menu["titulo"].includes("Macarrones con chorizo")
    }
);
console.log(filtro_plato);















//EJERCICIO 3
console.log("Ejercicio 3:");

let asignaturas={
    "Matemáticas": 60,
    "Física": 45,
    "Química": 53
}
let suma=0;
for(let nombre in asignaturas){
    console.log(`Asignatura: ${nombre}, Hora de clase: ${asignaturas[nombre]} minutos.`);
    suma+=asignaturas[nombre];
}
console.log(`Total de horas de clase: ${suma} minutos.`);


console.log(Object.keys(asignaturas));
console.log(Object.values(asignaturas));
console.log(Object.entries(asignaturas));


let nombres=Object.keys(asignaturas).sort((a,b)=>a.localeCompare(b));
console.log(nombres);


Object.entries(asignaturas).forEach(
    (nombre,horas)=>{
        console.log("Nombre: "+nombre+". Horas: "+horas);
    }
);

Object.entries(asignaturas)
    .sort(([nombreA,horasA],[nombreB,horasB])=>horasA-horasB)
    .forEach(([nombre,horas])=>console.log("Nombre: "+nombre+". Horas: "+horas));

let ordenMayorMenor=Object.entries(asignaturas)
                        .sort(([nombreA,horasA],[nombreB,horasB])=>horasB-horasA);

let asignaturaMasHoras=ordenMayorMenor[0][0];
console.log(asignaturaMasHoras);

for(let nombre in asignaturas){
    asignaturas[nombre]*=1.1;
}

console.log(asignaturas);


let asignaturasPlus={};
for(let nombre in asignaturas){
    asignaturasPlus[nombre]=asignaturas[nombre]+asignaturaMasHoras[nombre]*0.1;
}
console.log(asignaturasPlus);

let segundo_curso=[["Gimnasia",15],["biologia",70],["Música",30]];
console.log(Object.fromEntries(segundo_curso));
