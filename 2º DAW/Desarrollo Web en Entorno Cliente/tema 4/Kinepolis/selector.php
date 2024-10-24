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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: A10">
                    </div>
                <div class="container-MID">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: B10">
                    </div>
                <div class="container-RIGHT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: C9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 1: 10">
                    </div>
            </div>
            <span class="row-number">17</span>
        </div>
        
        <div class="row">
            <span class="row-number">16</span>
            <div class="container">
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
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
            <span class="row-number">16</span>
        </div>
        
        <div class="row">
            <span class="row-number">15</span>
            <div class="container">
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
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
            <span class="row-number">15</span>
        </div>
        <div class="row">
            <span class="row-number">14</span>
            <div class="container">
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
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
            <span class="row-number">14</span>
        </div>
        <div class="row">
            <span class="row-number">13</span>
            <div class="container-LEFT">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                <img>
                <img>
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
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
            <span class="row-number">13</span>
        </div>
        <div class="row">
            <span class="row-number">12</span>
            <d<div class="container">
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
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
                <span class="row-number">12</span>
        </div>
        <div class="row">
            <span class="row-number">11</span>
            <div class="container">
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
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
            <span class="row-number">11</span>
        </div>
        
        <div class="row">
            <span class="row-number">10</span>
            <div class="container">
                <div class="container-LEFT">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A3">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 2: A10">
                    </div>
                <div class="container-MID">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B6">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B7">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B8">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B9">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 8: B10">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
                    </div>
                <div class="container-MID">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B1">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B2">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B3">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B4">
                    <img>
                    <img>
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B5">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B6">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B7">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B8">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
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
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A1">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A2">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A3">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 9: A5">
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
        
        <div class="pantalladibujo">
        <div class="row">
            <span class="row-number">1</span>
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
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B1">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B2">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B3">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B4">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B5">
                    <img src="seat-available.svg" alt="Seat" class="seat" data-seat-id="Fila 10: B6">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B7">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B8">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B9">
                    <img src="seat-available.svg" alt="seat" class="seat" data-seat-id="Fila 10: B10">
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
            <span class="row-number">1</span>
        </div>
        <div class="seats-screen" data-seats-screen="" ">Pantalla</div>
        </div>

        <!-- Resumen de la selección -->
        <p>Asientos seleccionados: <span id="selectedSeats">Ninguno</span></p>
        <button id="reserveBtn">Reservar</button>
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