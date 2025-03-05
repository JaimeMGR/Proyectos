
//https://api.mymemory.translated.net/get

const texto_spa = document.getElementById("spa");
const texto_eng = document.getElementById("eng");


texto_spa.addEventListener("input",
    async () => {
        const texto = texto_spa.value.trim();
        const url = `https://api.mymemory.translated.net/get?q=${texto}}&langpair=es|en`;
        const respuesta = await fetch(url);
        const datos = await respuesta.json();

        texto_eng.value = datos.responseData.translatedText;
    }
);
