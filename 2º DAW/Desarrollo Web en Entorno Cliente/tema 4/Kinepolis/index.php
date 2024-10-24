<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <div class="contenido">
    <header>
        <h1>Reserva tus Entradas de Cine</h1>
    </header>
    <main>
    <form action="selector.php" method="POST">

        <label for="normal">Normal                   9,20€</label>
        <input type="number" id="normal" name="normal"><br><br>
        
        <section class="reservation-button">
            <input type="submit">Reservar</input>
        </section>
    </form>
    </main>
    <footer>
        <p>&copy; 2024 Cine Molina. Todos los derechos reservados.</p>
    </footer>
    </div>
</body>
</html>