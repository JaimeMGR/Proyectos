// Escribir un programa que dado un string lo muestre, pero con los caracteres ordenados
// alfabéticamente. Usa split, sort y join.

"use strict"

function ordenalfabetico(){
    let palabra = prompt("Escribe una palabra: ");
    
    let letras = palabra.split("");
    letras.sort();
    let palabra_ordenada = letras.join("");
    
    console.log(`La palabra ordenada alfabéticamente es: ${palabra_ordenada}`);
}

ordenalfabetico();