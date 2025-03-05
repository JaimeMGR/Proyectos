// Escriba un programa conversor de centímetros a kens y shakus, unidades japonesas de
// longitud. Un ken son seis shakus y un shaku equivale a 30,3 cm. 

"use strict"

function conversorlongitud(){
    cenimetros = 169;

    let shaku = centimetros / 30.3;
    let kens = shaku * 6;

    console.log(`${centimetros} centimetros equivalen a ${shaku} shaku y ${kens} kens.`);
}

conversorlongitud();