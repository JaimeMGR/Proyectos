// "use strict"

// EJERCICIO 1
console.log("Ejercicio 1:");

console.log("A partir de una cadena de búsqueda filtra todos los discos que la incluyan en su título.")
let buscar="the";

let filtro_titulo=tienda.filter(
    (disco)=>{disco["titulo"]
    }
);
console.log(filtro_titulo);

console.log("Filtrar los discos por país (suponemos que lo ha introducido el usuario en un variable) y después mostrarlos ordenados por copias vendidas");
let pais="ESP";

let filtro_pais=tienda.filter((disco)=>disco["pais"]===pais)
    .sort((a,b)=>a["copias"]-b["copias"]);

console.log(filtro_pais);

console.log("Mostrar los datos del álbum más reciente.");
tienda.sort((a,b)=>b["publicación"]-a["publicación"]);
console.log(tienda[0]);

console.log(" Obtener la recaudación total organizada por países");

let paises=[];
tienda.forEach(disco => {
    if(!paises.includes(disco["pais"])){
         paises.push(disco["pais"]);
}});
console.log(paises);

// let numeros=[1,2,3,5,6,7,8,6,9,7,2];

// let sinrepes=numeros.filter(
//      (numero, posicion) => numeros.indexOf(numero) === posicion);

// console.log(sinrepes);



console.log("Obtener la recaudación total organizada por países.")


let recaudacion={};//NOMBRE DEL PAIS ES LA CLAVE
tienda.forEach(disco => {
    recaudacion[disco["pais"]]??=0;
    recaudacion[disco["pais"]]+=disco["copias"]*1000*disco["precio"];
})

console.log(recaudacion);


//EJERCICIO 2
console.log("Ejercicio 2:");

console.log("Buscar un plato a partir del nombre (suponemos que el usuario lo ha escrito en una variable).");

let busqueda="Tostada Francesa";

let filtro_plato=menu.filter((menu)=>menu["nombre"].toLowerCase()===busqueda.toLowerCase());

console.log(filtro_plato);
console.log("Filtrar los platos que con mayor número de calorías que el usuario indique.");

let max_calorias=900;
let filtro_calorias=menu.filter((menu)=>menu["calorias"]>=max_calorias);
console.log(filtro_calorias);

console.log("Mostrar el plato del menú con menor número de calorías.");

let min_calorias=menu.reduce((min, menu)=>menu["calorias"]<min?menu["calorias"]:min, Infinity);

let plato_min_calorias=menu.find((menu)=>menu["calorias"]===min_calorias);

console.log(plato_min_calorias);
console.log("Obtener el nombre y el precio del plato más caro.");

let max_precio=menu.reduce((max, menu)=>menu["precio"]>max?menu["precio"]:max, 0);

let plato_max_precio=menu.find((menu)=>menu["precio"]===max_precio);

console.log(plato_max_precio);

console.log("Obtener la suma de calorías según el tipo de plato de la carta (desayuno, almuerzo, cena), vuestro tiene que funcionar si se añaden o quitan tipos de platos de la carta");

let carta=["desayuno", "almuerzo", "cena"];

let suma_calorias=0;

carta.forEach(tipo=>{
    suma_calorias+=menu.filter((menu)=>menu["carta"]===tipo).reduce((suma, menu)=>suma+menu["calorias"], 0);
});

console.log(suma_calorias);

// //EJERCICIO 3
console.log("Ejercicio 3:");

console.log("Mostrar todas las asignaturas.")
let asignaturas={
    "Matemáticas": 60,
    "Física": 45,
    "Química": 53
}

console.log("Suma de las horas de todas las asignaturas.")
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


// Ejercicio 5

// Escribir un programa que, partiendo de una estructura de datos con los precios de las frutas de una
// tienda, permita realizar las siguientes acciones:

preciofrutas = {
"Plátano" : 1.35,
"Manzana" : 0.80,
"Pera" : 0.85,
"Naranja" : 0.70
}

console.log("Dado un número de kilos X mostrar el precio total de llevarse X kilos de cada fruta.");

let kilos = 2;

let totalPrecio = 0;

for(let fruta in preciofrutas){
    totalPrecio += preciofrutas[fruta] * kilos;
    console.log(`El precio de ${fruta} es ${preciofrutas[fruta] * kilos}€.`);
}

console.log("Mostrar las frutas junto con su precio ordenadas de mayor a menor precio.");

let frutasOrdenadas = Object.entries(preciofrutas).sort(([a,b], [c,d]) => d - b);

console.log(frutasOrdenadas);

console.log("Mostrar la fruta con menor precio.");

let frutaMenorPrecio = frutasOrdenadas[0][0];

console.log(`La fruta con menor precio es ${frutaMenorPrecio} con un precio de ${frutasOrdenadas[0][1]}€.`);

console.log("Mostrar las frutas junto con su precio ordenadas alfabéticamente.");

let frutasAlfabeticamente = Object.entries(preciofrutas).sort(([a,b], [c,d]) => a.localeCompare(c));

console.log(frutasAlfabeticamente);

console.log("Crear un objeto nuevo con solo las frutas que empiecen por “P”.");

let frutasConPrefijoP = {};

for(let fruta in preciofrutas){
    if(fruta.startsWith("P")){
        frutasConPrefijoP[fruta] = preciofrutas[fruta];
    }
}

console.log(frutasConPrefijoP);

console.log("Crear un objeto nuevo subiendo el precio un 15% a las frutas que valgan menos de 1€/kg y bajar un 5% las que valgan más de un 1€/Kg.");

let frutasModificadas = {};

for(let fruta in preciofrutas){
    if(preciofrutas[fruta] < 1){
        frutasModificadas[fruta] = preciofrutas[fruta] * 1.15;
    } else {
        frutasModificadas[fruta] = preciofrutas[fruta] * 0.95;
    }
}

console.log(frutasModificadas);