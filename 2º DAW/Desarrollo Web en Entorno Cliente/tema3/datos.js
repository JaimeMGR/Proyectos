'use strict'

const productos = [
  { "nombre": "Bicicleta", "precio": 100, "categoria": "deportes" },
  { "nombre": "TV", "precio": 200, "categoria": "electronica" },
  { "nombre": "Album", "precio": 10, "categoria": "papeleria" },
  { "nombre": "Libro", "precio": 5, "categoria": "libreria" },
  { "nombre": "Telefono", "precio": 500, "categoria": "electronica" },
  { "nombre": "Ordenador", "precio": 1000, "categoria": "informatica" },
  { "nombre": "Teclado", "precio": 25, "categoria": "informatica" }
];


const menu = [
  {
    "nombre": "Gofres Belgas",
    "precio": 5.95,
    "descripcion": "Dos de nuestros famosos Gofres belgas con abundante sirope",
    "calorias": 650,
    "carta": "desayuno",
    "imagen": "https://i.ytimg.com/vi/kB-NtTwLYW0/maxresdefault.jpg"
  },
  {
    "nombre": "Gofres Belgas con fresas",
    "precio": 7.95,
    "descripcion": "Ligeros gofres belgas cubiertos de fresas y nata montada",
    "calorias": 900,
    "carta": "desayuno",
    "imagen": "https://images.freeimages.com/images/premium/previews/2045/20454301-belgian-waffle-with-strawberries.jpg"
  },
  {
    "nombre": "Gofres Belgas con frutas del bosque",
    "precio": 8.95,
    "descripcion": "Ligeros gofres belgas cubiertos de frutas del bosque y nata montada",
    "calorias": 900,
    "carta": "desayuno",
    "imagen": "https://previews.123rf.com/images/merc67/merc671507/merc67150700302/42737701-verano-el-desayuno-gofres-belgas-con-frutas-frescas-y-miel.jpg"
  },
  {
    "nombre": "Tostada Francesa",
    "precio": 4.5,
    "descripcion": "Dos gruesas rebanadas de nuestro pan frances casero",
    "calorias": 600,
    "carta": "desayuno",
    "imagen": "https://www.rebanando.com/media/tostadas-francesas-french-toast-jpg_crop.jpeg/rh/tostadas-francesas-french-toast.jpg"
  },
  {
    "nombre": "Desayuno de la casa",
    "precio": 6.95,
    "descripcion": "Dos huevos, bacon o salchicha, tostada y patatas fritas",
    "calorias": 950,
    "carta": "desayuno",
    "imagen": "http://www.contigosalud.com/files/content/2016/Articulos%202016/desayuno%20fuera.jpg"

  },
  {
    "nombre": "Solomillo en salsa",
    "precio": 14.50,
    "descripcion": "Medallones de solomillo con salsa de pimienta verde o woronoff a elegir",
    "calorias": 1000,
    "carta": "cena",
    "imagen": "https://www.annarecetasfaciles.com/files/solomillo-al-vino.jpg"
  },
  {
    "nombre": "Macarrones con chorizo",
    "precio": 7.95,
    "descripcion": "Macarrones con salsa italiana de tomate y chorizo seco",
    "calorias": 850,
    "carta": "almuerzo",
    "imagen": "https://www.cocinacaserayfacil.net/wp-content/uploads/2020/04/Recetas-de-comidas-para-ni%C3%B1os.jpg"
  },
  {
    "nombre": "Callos",
    "precio": 6.95,
    "descripcion": "cazuela para una persona de callos clasicos",
    "calorias": 1000,
    "carta": "almuerzo",
    "imagen": "https://i.blogs.es/19bd5c/callos/450_1000.jpg"
  },
  {
    "nombre": "Hamburguesa Gourmet",
    "precio": 10.25,
    "descripcion": "Carne de vacuno con lechuga, maiz, pepinillos, tomate, huevo frito ,etc",
    "calorias": 1000,
    "carta": "cena",
    "imagen": "https://sevilla.abc.es/gurme/wp-content/uploads/sites/24/2012/01/comida-rapida-casera.jpg"
  },
  {
    "nombre": "Tortilla de patatas",
    "precio": 4.67,
    "descripcion": "Tortilla de patatas clasica sin cebolla",
    "calorias": 500,
    "carta": "cena",
    "imagen": "https://lacocinadefrabisa.lavozdegalicia.es/wp-content/uploads/2019/05/tortilla-espa%C3%B1ola.jpg"
  }

]

const tienda = [
  {
    "titulo": "Still got the blues",
    "artista": "Gary Moore",
    "pais": "UK",
    "precio": 13.20,
    "publicacion": 1990,
    "copias": 120, //miles de copias
    "caratula": "https://images-na.ssl-images-amazon.com/images/I/71o6gIerHwL._SY355_.jpg"
  },
  {
    "titulo": "Recopilatorio de fados",
    "artista": "Varius artist",
    "pais": "PT",
    "precio": 20,
    "publicacion": 2024,
    "copias": 500, //miles de copias
    "caratula": "https://images-na.ssl-images-amazon.com/images/I/71o6gIerHwL._SY355_.jpg"
  },
  {
    "titulo": "One night only",
    "artista": "Bee Gees",
    "pais": "UK",
    "precio": 11.90,
    "copias": 200,
    "publicacion": 1998,
    "caratula": "https://is5-ssl.mzstatic.com/image/thumb/Music111/v4/fe/9c/c2/fe9cc271-e47a-28f4-c5b4-505da8d2ef10/UMG_cvrart_00731455922028_01_RGB72_1800x1800_06UMGIM54033.jpg/268x0w.jpg"
  },
  {
    "titulo": "When a man loves a women",
    "artista": "Percy Sleedge",
    "pais": "USA",
    "precio": 8.70,
    "copias": 450,
    "publicacion": 1987,
    "caratula": "https://images-na.ssl-images-amazon.com/images/I/41RST7VYA1L.jpg"
  },
  {
    "titulo": "Big Willie style",
    "artista": "Will Smith",
    "pais": "USA",
    "precio": 9.90,
    "copias": 10,
    "publicacion": 1997,
    "caratula": "https://images-na.ssl-images-amazon.com/images/I/517N7Y7xjUL._SY355_.jpg"
  },
  {
    "titulo": "La cancion de Juan Perro",
    "artista": "Radio Futura",
    "pais": "ESP",
    "precio": 12,
    "copias": 68,
    "publicacion": 1987,
    "caratula": "http://lafonoteca.net/wp-content/uploads/2008/11/Radio_Futura-La_Cancion_De_Juan_Perro-Frontal-600x600.jpg"
  },
  {
    "titulo": "The dock of the bay",
    "artista": "Otis Redding",
    "pais": "USA",
    "precio": 7.9,
    "copias": 123,
    "publicacion": 1987,
    "caratula": "http://images.tritondigitalcms.com/6616/sites/374/2018/03/15091232/otis-dock-45.jpg"
  },
  {
    "titulo": "The Dark Side of the Moon",
    "artista": "Pink Floyd",
    "pais": "UK",
    "precio": 10.9,
    "copias": 50,
    "publicacion": 1987,
    "caratula": "https://www.discogs.com/es/Pink-Floyd-The-Dark-Side-Of-The-Moon/master/10362"
  },
  {
    "titulo": "Kill 'em all",
    "artista": "Metallica",
    "pais": "UK",
    "precio": 15.6,
    "copias": 123,
    "publicacion": 1986,
    "caratula": "https://pbs.twimg.com/media/EdyeXaIXkAUvn9D.png"
  },
  {
    "titulo": "Un dia cualquiera",
    "artista": "Nacha Pop",
    "pais": "ESP",
    "precio": 5.9,
    "copias": 60,
    "publicacion": 2003,
    "caratula": "https://cloud10.todocoleccion.online/musica-cds/fot/2006/07/27/3157127.jpg"
  }


];


