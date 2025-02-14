"use strict"

function cargarImagen(url) {
    return new Promise((resolve, reject) => {
        const imagen = new Image();
        imagen.style.width = "25%";
        imagen.src = url;
        imagen.onload = resolve(imagen);
        imagen.onerror = reject(new Error("No se ha podido cargar la imagen :P"));
    })
}

cargarImagen("https://i1.sndcdn.com/artworks-dz74b2QzsPqQ2RDu-qxNGLw-t500x500.jpg")
    .then((imagen) => {
        document.body.appendChild(imagen);
    })
    .catch((error) => {
        console.log(error)
        const fallback=document.createElement("img");
        fallback.src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-7NlJmiLfUeG79zAmuGg0Q6yeerifFLuwhQ&s";
        document.body.appendChild(fallback);   
    });

