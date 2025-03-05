// Escribir un programa que determine cuando una frase es un palíndromo haciendo 2
// versiones: una usando bucles y otra usando método/s de String.

"use strict"

    function metodostring(){
        while(palabra.length <= 0){
            let palabra = prompt("Escribe una palabra: ");
        
            let palabra_invertida = palabra.split("").reverse().join("");
            
            if(palabra_invertida === palabra){
                console.log("Es un palíndromo.");
            } else {
                console.log("Es un palíndromo.");
            }
        }
    }

    function metodobucles(){
        
        while(palabra.length <=0){
            let palabra = prompt("Escribe una palabra: ");
        
        let palindromo = true;
        
        for(let i = 0; i < palabra.length / 2; i++){
            if(palabra[i]!== palabra[palabra.length - 1 - i]){
                palindromo = false;
                break;
            }
        }
        
        if(palindromo){
            console.log("Es un palíndromo.");
        } else {
            console.log("No es un palíndromo.");
        }
    }
}

metodostring();
metodobucles();