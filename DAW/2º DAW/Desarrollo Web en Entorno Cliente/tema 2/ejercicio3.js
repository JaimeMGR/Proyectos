// Pedir que un usuario acierte un numero entre 1 y 100 dando pistas usar prompt y ejecutarlo
// en la consola del navegador. Si queréis que el usuario introduzca los datos ejecutar el código
// desde la consola del navegador.

"use strict"

function juegonumero(){
    let numero = Math.floor(Math.random() * 100) + 1;
    let intentos = 0;

        while(numero_usuario != numero){
            let numero_usuario = prompt("Di un número entre 1 y 100: ");
            intentos++;
            if(numero_usuario < numero){
                console.log("El número es menor.");
            }else if(numero_usuario > numero){
                console.log("El número es mayor.");
            }
        }
    }

    juegonumero();