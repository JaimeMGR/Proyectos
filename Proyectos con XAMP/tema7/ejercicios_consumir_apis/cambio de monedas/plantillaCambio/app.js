document.addEventListener("DOMContentLoaded", () => {
    const API_URL = "https://open.er-api.com/v6/latest/";
    const contenedorApi = document.getElementById("contenedor_api");
    const cargando = document.getElementById("cargando");
    const intercambiarBtn = document.getElementById("intercambiar");
    const verBtn = document.getElementById("ver");
    const dineroInput = document.getElementById("dinero");
    const divisaEntrada = document.getElementById("divisa_entrada");
    const divisaSalida = document.getElementById("divisa_salida");

    // Añadir más divisas
    const divisasAdicionales = [
        { value: "JPY", text: "Yen Japonés" },
        { value: "AUD", text: "Dólar Australiano" },
        { value: "CAD", text: "Dólar Canadiense" }
    ];

    divisasAdicionales.forEach(divisa => {
        const optionEntrada = document.createElement("option");
        optionEntrada.value = divisa.value;
        optionEntrada.text = divisa.text;
        divisaEntrada.appendChild(optionEntrada);

        const optionSalida = document.createElement("option");
        optionSalida.value = divisa.value;
        optionSalida.text = divisa.text;
        divisaSalida.appendChild(optionSalida);
    });

    cargando.style.display = "none";

    async function obtenerTasasDeCambio(moneda) {
        cargando.style.display = "block";
        try {
            const respuesta = await fetch(`${API_URL}${moneda}`);
            if (!respuesta.ok) {
                throw new Error(`Error: ${respuesta.status} - ${respuesta.statusText}`);
            }
            const datos = await respuesta.json();
            return datos.rates;
        } catch (error) {
            alert("Hubo un error al obtener las tasas de cambio: " + error.message);
        } finally {
            cargando.style.display = "none";
        }
    }

    function crearFila(divisaOrigen, divisaDestino, valorOrigen, valorDestino) {
        const fila = document.createElement("tr");

        const tdDivisaOrigen = document.createElement("td");
        tdDivisaOrigen.innerText = divisaOrigen;

        const tdDivisaDestino = document.createElement("td");
        tdDivisaDestino.innerText = divisaDestino;

        const tdValorOrigen = document.createElement("td");
        tdValorOrigen.innerText = valorOrigen;

        const tdValorDestino = document.createElement("td");
        tdValorDestino.innerText = valorDestino;

        fila.appendChild(tdDivisaOrigen);
        fila.appendChild(tdDivisaDestino);
        fila.appendChild(tdValorOrigen);
        fila.appendChild(tdValorDestino);

        return fila;
    }

    verBtn.addEventListener("click", async () => {
        const cantidad = parseFloat(dineroInput.value);
        const monedaOrigen = divisaEntrada.value;
        const monedaDestino = divisaSalida.value;

        if (isNaN(cantidad)) {
            alert("Por favor, ingresa una cantidad válida.");
            return;
        }

        if (!monedaOrigen || !monedaDestino) {
            alert("Por favor, selecciona las divisas de origen y destino.");
            return;
        }

        const tasasDeCambio = await obtenerTasasDeCambio(monedaOrigen);
        if (tasasDeCambio) {
            const tasaDeCambio = tasasDeCambio[monedaDestino];
            const valorConvertido = cantidad * tasaDeCambio;

            const fila = crearFila(monedaOrigen, monedaDestino, cantidad.toFixed(2), valorConvertido.toFixed(2));
            contenedorApi.appendChild(fila);
        }
    });

    intercambiarBtn.addEventListener("click", () => {
        const temp = divisaEntrada.value;
        divisaEntrada.value = divisaSalida.value;
        divisaSalida.value = temp;
    });
});