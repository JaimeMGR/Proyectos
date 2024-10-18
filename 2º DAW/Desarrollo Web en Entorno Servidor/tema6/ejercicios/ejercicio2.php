<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Multiplicar</title>
</head>
<body>
    <h1>Selecciona una tabla de multiplicar y un color</h1>
    
    <form action="" method="GET">
        <!-- Lista desplegable para elegir la tabla -->
        <label for="tabla">Tabla de multiplicar:</label>
        <select name="tabla" id="tabla">
            <?php
            // Genera las opciones para las tablas de multiplicar (1-10)
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>Tabla del $i</option>";
            }
            ?>
        </select>
        <br><br>

        <!-- Conjunto de botones de opción para elegir el color -->
        <label for="color">Elige el color:</label><br>
        <input type="radio" name="color" value="red" id="rojo" required>
        <label for="rojo">Rojo</label><br>
        <input type="radio" name="color" value="blue" id="azul">
        <label for="azul">Azul</label><br>
        <input type="radio" name="color" value="green" id="verde">
        <label for="verde">Verde</label><br><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Mostrar tabla">
    </form>

    <?php
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Obtener la tabla y el color seleccionados
        $tabla = $_GET["tabla"];
        $color = $_GET["color"];

        // Mostrar la tabla de multiplicar en el color elegido
        echo "<div class='resultado'  style='color: $color;'>";
        echo "<h2>Tabla del $tabla</h2>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $tabla * $i;
            echo "$tabla x $i = $resultado<br>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
