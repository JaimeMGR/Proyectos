<<<<<<< Updated upstream
"use strict"

let titulo_h1=document.querySelector("h1");
titulos[0].innerText="Lo he hecho con JavaScript";
titulos[1].innerText="JavaScript mola";

let contenido=document.querySelectorAll("img");
contenido.forEach(imagen => {
    imagen.addeventListener("click", 
        () => {
            imagen.style.border="4px dotted orange";
            imagen.src="encendida.gif";
            imagen.style.borderRadius="50%";
})
}
);


for(let imagen of contenido){
    imagen.style.border="4px dotted orange";
}

=======
"use strict"

let titulo_h1=document.querySelector("h1");
titulos[0].innerText="Lo he hecho con JavaScript";
titulos[1].innerText="JavaScript mola";

let contenido=document.querySelectorAll("img");
contenido.forEach(imagen => {
    imagen.addeventListener("click", 
        () => {
            imagen.style.border="4px dotted orange";
            imagen.src="encendida.gif";
            imagen.style.borderRadius="50%";
})
}
);


for(let imagen of contenido){
    imagen.style.border="4px dotted orange";
}

>>>>>>> Stashed changes
