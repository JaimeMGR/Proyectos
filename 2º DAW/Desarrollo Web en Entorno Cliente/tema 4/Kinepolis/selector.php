<!DOCTYPE html>
<lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reserva de Asientos - Cine</title>
        <link rel="stylesheet" href="estilos.css"> <!-- Archivo CSS externo -->
    </head>
    <?php
    // Obtener los datos del formulario (usaremos un número fijo para este ejemplo)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $normal = trim($_POST['normal']);
        if ($normal == "") {
            $normal = 0;
        }
        $maxSeatsAllowed = $normal;
    } else {
        $maxSeatsAllowed = 0; // Número de asientos disponibles (fijo para este ejemplo)
    }
    ?>
    <div class="todo">
        <Header>
            <h1>Reserva de Asientos</h1>
        </Header>
        <div class="subheader">
            <a>Tickets disponibles: </a>
            <a id="maximoasientos"> <?php echo $maxSeatsAllowed ?></a><br>
        </div>
        <!-- Contenedor de los asientos -->
        <main>
            <div class="row">
                <span class="row-number">17</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: C9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 17: 10">
                    </div>
                </div>
                <span class="row-number">17</span>
            </div>
            <div class="row">
                <span class="row-number">16</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A3">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 16: C8">
                    </div>
                </div>
                <span class="row-number">16</span>
            </div>
            <div class="row">
                <span class="row-number">15</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A3">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 15: C8">
                    </div>
                </div>
                <span class="row-number">15</span>
            </div>
            <div class="row">
                <span class="row-number">14</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A3">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 14: C8">
                    </div>
                </div>
                <span class="row-number">14</span>
            </div>
            <div class="row">
                <span class="row-number">13</span>
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: A10">
                </div>
                <div class="container-MID">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: B10">
                </div>
                <div class="container-RIGHT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C4">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 13: C8">
                </div>
                <span class="row-number">13</span>
            </div>
            <div class="row">
                <span class="row-number">12</span>
                <d<div class="container">
                    <div class="container-LEFT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A3">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 12: C8">
                    </div>
                    <span class="row-number">12</span>
            </div>
            <div class="row">
                <span class="row-number">11</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A3">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 11: C8">
                    </div>
                </div>
                <span class="row-number">11</span>
            </div>
            <div class="row">
                <span class="row-number">10</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A3">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: A10">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: C8">
                    </div>
                </div>
                <span class="row-number">10</span>
            </div>
            <div class="row">
                <span class="row-number">9</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: C8">
                    </div>
                </div>
                <span class="row-number">9</span>
            </div>
            <div class="row">
                <span class="row-number">8</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B1">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B2">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B3">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B4">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B5">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B6">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B7">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B8">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B9">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 8: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: C8">
                    </div>
                </div>
                <span class="row-number">8</span>
            </div>
            <div class="row">
                <span class="row-number">7</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 7: C8">
                    </div>
                </div>
                <span class="row-number">7</span>
            </div>
            <div class="row">
                <span class="row-number">6</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 6: C8">
                    </div>
                </div>
                <span class="row-number">6</span>
            </div>
            <div class="row">
                <span class="row-number">5</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 5: C8">
                    </div>
                </div>
                <span class="row-number">5</span>
            </div>
            <div class="row">
                <span class="row-number">4</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 4: C8">
                    </div>
                </div>
                <span class="row-number">4</span>
            </div>
            <div class="row">
                <span class="row-number">3</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 3: C8">
                    </div>
                </div>
                <span class="row-number">3</span>
            </div>
            <div class="row">
                <span class="row-number">2</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B8">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B9">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: C8">
                    </div>
                </div>
                <span class="row-number">2</span>
            </div>
            <div class="row">
                <span class="row-number">1</span>
                <div class="container">
                    <div class="container-LEFT">
                        <img>
                        <img>
                        <img>
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A5">
                    </div>
                    <div class="container-MID">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B1">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B2">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B3">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B4">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B6">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B7">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B8">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B9">
                        <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 1: B10">
                    </div>
                    <div class="container-RIGHT">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C1">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C2">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C3">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C4">
                        <img>
                        <img>
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C5">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C6">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C7">
                        <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C8">
                    </div>
                </div>
                <span class="row-number">1</span>

            </div>
            <div class="pantalladibujo">PANTALLA</div>
            <br>
    

    <!-- Resumen de la selección -->
    <div class="resumen">
        <p>Asientos seleccionados:<br> <span id="selectedSeats">Ninguno</span></p>
    </div>
    <button id="reserveBtn">Reservar</button>
    </div>
    </main>
    <footer>
        <p>&copy; 2024 Cine Molina. Todos los derechos reservados.</p>
    </footer>
    </div>
    <script>
        const maxSeatsAllowed = <?php echo $maxSeatsAllowed; ?>; // Valor máximo de asientos permitidos
    </script>
    <script src="app.js"></script> <!-- Archivo JS externo -->

    </body>

    </html>