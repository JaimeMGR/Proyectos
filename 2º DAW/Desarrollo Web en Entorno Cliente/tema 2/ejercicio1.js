// Escribir un programa que convierta una cantidad de días a horas minutos y segundos. Usar
// templates para mostrar todos los datos. Si queréis que el usuario introduzca los datos
// ejecutar el código desde la consola del navegador.

"use strict"

function conversióntiempo(){
    dias = 4;
    let horas = dias * 24;
    let minutos = horas * 60;
    let segundos = minutos * 60;
    
    console.log(`${dias} días son lo mismo que ${horas} horas, ${minutos} minutos y ${segundos} segundos.`);
    
}

conversióntiempo();