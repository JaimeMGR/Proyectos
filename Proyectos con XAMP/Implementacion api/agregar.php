<?php

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $apiUrl = "http://localhost/academia/api.php"; // Cambia esta URL al endpoint correcto

    if (isset($_POST['nombre_asignatura']) && isset($_POST['creditos'])) {
        $nombre_asignatura = $_POST['nombre_asignatura'];
        $creditos =(int) $_POST['creditos'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'nombre_asignatura' => $nombre_asignatura,
            'creditos' => $creditos
        ]));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        
        $respuesta = json_decode(curl_exec($ch), true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if($httpCode==200){
            $mensaje="Insertada asignatura con éxito";
        }else{
            $error=$respuesta["error"];
        }


    } else {
        $error = "Todos los campos son requeridos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Asignatura</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Añadir Asignatura</h1>

    <?php if (isset($mensaje)) {
        echo "<p style='color: green;'>" . $mensaje;
        "</p>";
        header("Refresh: 3; url=index.php");
    }
    ?>

    <?php if (isset($error)) {
        echo "<p style='color: red;'>" . $error;
        "</p>";
    }
    ?>

    <form method="POST">
        <label for="nombre_asignatura">Nombre de la asignatura:</label>
        <input type="text" id="nombre_asignatura" name="nombre_asignatura" required>

        <label for="creditos">Créditos:</label>
        <input type="number" id="creditos" name="creditos" required>

        <button type="submit" class="add">Añadir Asignatura</button>
    </form>

    <a style="color:darkgreen" href="index.php">Volver al listado</a>
</body>

</html>