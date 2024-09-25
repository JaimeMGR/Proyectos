// Crear una función que dado un número entero devuelva la suma de sus dígitos. Primero
// intentarlo con bucles y después usa toString, Split, sort join y parseInt

"use strict"

    function suma_digitos_bucle(){
        do{
            let numero = prompt("Escribe un número: ");
        }while(numero <= 0);
        
        let suma = 0;
        while(numero !== 0){
            suma += numero % 10;
            numero = Math.floor(numero / 10);
        }
        
        console.log(`La suma de los dígitos del número es: ${suma}`);
    }

    function suma_digitos_tostring(){
        do{
            let numero = prompt("Escribe un número: ");
        }while(numero <= 0);

        numero.toString().split('').reduce((acumulador, digito) => acumulador + parseInt(digito), 0);

    }

    suma_digitos_bucle();
    suma_digitos_tostring();