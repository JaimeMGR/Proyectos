const tabla = document.querySelector("#lista_api");
const cargando = document.querySelector("#cargando");
const boton=document.querySelector("#descargar");
 
 
boton.addEventListener("click", async () => {
  cargando.style.display = "black";
  const respuesta = await fetch("http://www.rtve.es/api/noticias.json");
  const datos = await respuesta.json();
  const noticias = datos.page.items;
  tabla.innerHTML = "";
  for(let noticia of noticias){
    const dom_noticia = crearFila(noticia.title, noticia.image, noticia.html);
    tabla.appendChild(dom_noticia);
  }
  cargando.style.display = "none";
 
 
 
 
  // cargando.style.disblock = "block";
 
  // fetch("http://www.rtve.es/api/noticias.json")
  // .then(respuesta => respuesta.json())
  // .then(datos => {
  //             const noticias = datos.page.items;
  //             tabla.innerHTML = "";
  //             for(let noticia of noticias){
  //               const dom_noticia = crearFila(noticia.title, noticia.image, noticia.html);
  //               tabla.appendChild(dom_noticia);
  //             }
  //             cargando.style.display = "none";
 
  // });
});
 
const crearFila=(titulo, url_imagen, url_enlace)=> {
  const fila = document.createElement("tr");
 
  const enlace = document.createElement("a");
  enlace.innerHTML = "Ir a noticia";
  enlace.href = url_enlace;
 
  const imagen = document.createElement("img");
  imagen.style.width = "25%";
  imagen.src = url_imagen;
 
  const td_enlace = document.createElement("td");
  td_enlace.appendChild(enlace);
 
  const td_imagen = document.createElement("td");
  td_imagen.appendChild(imagen);
 
  const td_titulo = document.createElement("td");
  td_titulo.innerHTML = titulo;
 
  fila.appendChild(td_titulo);
  fila.appendChild(td_imagen);
  fila.appendChild(td_enlace);
 
  return fila;
}