"user strict"

let arr=[1,2,3];
let copia=[...arr];
// copia[0]=25;

console.log(arr);
console.log(copia);

let objeto={
     a:6,
     b:43,
     c:32
};
let copia_objeto={...objeto};



let copia=[v1,v2,v3,v4]=abc;
console.log(v1,v2,v3,v4);

let vacio={};
[vacio.nombre,vacio.apellidos]=["Homer","Simpson"];
console.log(vacio.nombre,vacio.apellidos);

let opciones={
    titulo:"Menu",
    width:200,
    height:100
};
let {titulo,width,height}=opciones;
console.log(titulo,width,height);