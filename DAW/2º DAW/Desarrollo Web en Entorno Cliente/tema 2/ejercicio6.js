// Escribir un programa que dado un string lo muestre, pero con los caracteres en orden
// inverso. Usa split, reverse y join

"use strict"

function ordenreverso(){
    let palabra = prompt("Escribe una palabra: ");
    
    let letras = palabra.split("");
    letras.reverse();
    let palabra_invertida = letras.join("");
    
    console.log(`La palabra ingresada invertida es: ${palabra_invertida}`);
}

ordenreverso();