"use strict";

const seats = document.querySelectorAll('.seat');
const selectedSeats = document.getElementById('selectedSeats');
const reserveBtn = document.getElementById('reserveBtn');
let selectedSeatIds = [];
const seatPrice = 9.20; // Precio por entrada


// Función para seleccionar/deseleccionar un asiento
seats.forEach(seat => {
    seat.addEventListener('click', () => {
        const seatId = seat.getAttribute('data-seat-id');

        if (selectedSeatIds.includes(seatId)) {
            // Si el asiento ya está seleccionado, lo deseleccionamos
            seat.src = 'seat-available.svg';
            selectedSeatIds = selectedSeatIds.filter(id => id !== seatId);
        } else {
            // Si el asiento no está seleccionado
            if (selectedSeatIds.length < maxSeatsAllowed) {
                // Si aún no se ha alcanzado el límite de asientos, seleccionamos
                seat.src = 'seat-selected.svg';
                selectedSeatIds.push(seatId);
            } else {
                // Si ya se han seleccionado el máximo de asientos, deseleccionamos el primero seleccionado
                const firstSeatId = selectedSeatIds.shift();
                const firstSeat = document.querySelector(`.seat[data-seat-id="${firstSeatId}"]`);
                firstSeat.src = 'seat-available.svg'; // Cambia de vuelta a "disponible"

                // Seleccionamos el nuevo asiento
                seat.src = 'seat-selected.svg';
                selectedSeatIds.push(seatId);
            }
        }

        // Actualiza el resumen de asientos seleccionados
        updateSelectedSeats();
    });
});

// Función para actualizar la lista de asientos seleccionados
function updateSelectedSeats() {
    if (selectedSeatIds.length > 0) {
        selectedSeats.textContent = selectedSeatIds.join(', ');
    } else {
        selectedSeats.textContent = 'Ninguno';
    }
}

// Botón de reservar asientos
reserveBtn.addEventListener('click', () => {
    if (selectedSeatIds.length > 0) {
        const totalPrice = selectedSeatIds.length * seatPrice;
        alert(`Has reservado los siguientes asientos: ${selectedSeatIds.join(', ')}\nEl precio total es: ${totalPrice.toFixed(2)}€`);
        // Aquí podrías agregar lógica para enviar los asientos seleccionados a un servidor
    } else {
        alert('No has seleccionado ningún asiento.');
    }
});
