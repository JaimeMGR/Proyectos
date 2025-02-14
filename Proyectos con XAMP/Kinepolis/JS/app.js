"use strict";

const seats = document.querySelectorAll('.seat');
const selectedSeats = document.getElementById('selectedSeats');
const reserveBtn = document.getElementById('reserveBtn');
let selectedSeatIds = [];
const seatPrice = 9.20; // Precio por entrada

// Función para seleccionar/deseleccionar un asiento
seats.forEach(seat => {
    seat.addEventListener('click', () => {
        // Verifica si el asiento está reservado, si es así, evita que sea seleccionado
        if (seat.classList.contains('reserved')) {
            return; // Sale de la función sin hacer nada
        }

        const seatId = seat.getAttribute('data-seat-id');

        if (selectedSeatIds.includes(seatId)) {
            // Si el asiento ya está seleccionado, lo deseleccionamos
            seat.src = 'Imagenes/seat-available.svg';
            selectedSeatIds = selectedSeatIds.filter(id => id !== seatId);
        } else {
            // Si el asiento no está seleccionado
            if (selectedSeatIds.length < maxSeatsAllowed) {
                // Si aún no se ha alcanzado el límite de asientos, seleccionamos
                seat.src = 'Imagenes/seat-selected.svg';
                selectedSeatIds.push(seatId);
            } else {
                // Si ya se han seleccionado el máximo de asientos, deseleccionamos el primero seleccionado
                const firstSeatId = selectedSeatIds.shift();
                const firstSeat = document.querySelector(`.seat[data-seat-id="${firstSeatId}"]`);
                firstSeat.src = 'Imagenes/seat-available.svg'; // Cambia de vuelta a "disponible"

                // Seleccionamos el nuevo asiento
                seat.src = 'Imagenes/seat-selected.svg';
                selectedSeatIds.push(seatId);
            }
        }

        // Actualiza el resumen de asientos seleccionados
        updateSelectedSeats();
    });

    seat.addEventListener('mouseover', () => {
        datos(seat);
    });

    seat.addEventListener('mouseleave', () => {
        document.getElementById('Fila').textContent = '';
        document.getElementById('Seccion').textContent = '';
        document.getElementById('Numero').textContent = '';
        document.getElementById('Precio').textContent = '';
    });
});

// Función para mostrar datos del asiento en el evento mouseover
function datos(seat) {
    const numeroElem = document.getElementById('Numero')
    const filaElem = document.getElementById('Fila');
    const seccionElem = document.getElementById('Seccion');
    const precioElem = document.getElementById('Precio');

    fetch('asientos.json')
        .then(response => response.json())
        .then(data => {
            // Accede a data.asientos para usar el array correctamente
            const seatData = data.asientos.find(item => item['data-seat-id'] === seat.getAttribute('data-seat-id'));
            if (seatData) {
                numeroElem.textContent = seatData.numero;
                filaElem.textContent = seatData.Fila;
                seccionElem.textContent = seatData.Seccion;
                precioElem.textContent = seatData.Precio;
            }
        });
}

// Función para actualizar la lista de asientos seleccionados
function updateSelectedSeats() {
    if (selectedSeatIds.length > 0) {
        selectedSeats.textContent = selectedSeatIds.join(', ');
    } else {
        selectedSeats.textContent = 'Ninguno';
    }
}

// Función para guardar asientos en JSON
function saveToJSON(seatIds) {
    const data = {
        reservedSeats: seatIds,
        totalPrice: seatIds.length * seatPrice
    };

    // Enviar datos al servidor
    fetch('Reservas.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(result => {
            console.log('Asientos guardados:', result);
        })
        .catch(error => {
            console.error('Error al guardar los asientos:', error);
        });
}

// Botón de reservar asientos
reserveBtn.addEventListener('click', () => {
    if (selectedSeatIds.length > 0) {
        const totalPrice = selectedSeatIds.length * seatPrice;
        alert(`Has reservado los siguientes asientos: ${selectedSeatIds.join(', ')}\nEl precio total es: ${totalPrice.toFixed(2)}€`);

        // Cambia los asientos a "reservados" y desactívalos
        selectedSeatIds.forEach(seatId => {
            const seat = document.querySelector(`.seat[data-seat-id="${seatId}"]`);
            seat.src = 'Imagenes/seat-locked.svg';
            seat.classList.add('reserved'); // Clase que podemos usar para deshabilitar clicks
            seat.removeEventListener('click', () => { }); // Elimina el evento de click
        });

        // Guarda los datos en un archivo JSON
        saveToJSON(selectedSeatIds);

        // Limpia la selección
        selectedSeatIds = [];
        updateSelectedSeats();
    } else {
        alert('No has seleccionado ningún asiento.');
    }
});