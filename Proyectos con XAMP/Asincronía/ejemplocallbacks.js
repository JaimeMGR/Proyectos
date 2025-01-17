"use strict"

// CALLBACK , PROMISE

function operacion(a, b, op) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(op(a, b));
        }, 3000);
    });
}
operacion(7, 4, (x, y) => x + y).then(
    (resultado) => {
        console.log(resultado);
    });

// let resultado = operacion(5, 6, (x, y) => x + y);
// console.log(resultado);
// resultado = operacion(5, 6, (x, y) => x * y);
// console.log(resultado);
// resultado = operacion(5, 6, (x, y) => x - y);
// console.log(resultado);

// let contador = 0;

// document.body.addEventListener("click",
//     () => {
//         contador++;
//     }
// )
// console.log(contador);

// Callback hell

obtenerTareas()
.then(tareas => filtrarTareas(tareas))
.then(tareasPendientes => enviarRecordatorio(tareasPendientes)