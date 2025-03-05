<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Document</title>
</head>
<body>
    <h1>Información de alumno</h1>
    <form action="DatosAlumno.php" method="POST">
    <label for="nombre_completo">Nombre completo:</label>
    <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>