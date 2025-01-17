<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Document</title>
</head>
<body>
    <h1>Nueva asignatura</h1>
    <form action="nuevaAsignatura.php" method="POST">
    <label for="nombre_asignatura">Nombre:</label>
    <input type="text" id="nombre_asignatura" name="nombre_asignatura" required><br><br>

    <label for="creditos">Créditos:</label>
    <input type="number" id="creditos" name="creditos" required><br><br>

    <input type="submit" value="Enviar">
    </form>
</body>
</html>