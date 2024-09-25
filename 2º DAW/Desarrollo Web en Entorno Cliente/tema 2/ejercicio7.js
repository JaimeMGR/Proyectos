// Crear una función que dado un número entero devuelva el mismo número, pero con los
// dígitos ordenados de menor a mayor. Usa toString, Split, sort join y parseInt

"use strict"

function menoramayorr(){
    let numero = prompt("Escribe un número: ");
    
    numero = parseInt(numero);
    numero = numero.toString().split('').sort().join("");

    console.log(`El número ordenado de menor a mayor es: ${numero}`);
}

menoramayorr();