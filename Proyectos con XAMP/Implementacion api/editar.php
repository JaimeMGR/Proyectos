<?php
// URL del backend (API)
$apiUrl = "http://localhost/academia/api.php"; // Cambia esta URL al endpoint correcto

// Función para hacer una solicitud GET a la API usando cURL
function getAsignatura($id)
{
    global $apiUrl;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl . "?id=" . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPGET, true);

    $respuesta = curl_exec($ch);
    curl_close($ch);

    return json_decode($respuesta, true);

}

// Obtener el ID de la asignatura desde la URL

if (isset($_GET['id'])) {
    $id_asignatura=$_GET['id'];
    $asignatura = getAsignatura($id_asignatura);
}

// Si el formulario ha sido enviado, actualizamos la asignatura
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre_asignatura']) && isset($_POST['creditos'])) {
        $id_asignatura= (int)$_POST['id'];
        $nombre_asignatura = $_POST['nombre_asignatura'];
        $creditos = (int) $_POST['creditos'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'id_asignatura' => $id_asignatura,
            'nombre_asignatura' => $nombre_asignatura,
            'creditos' => $creditos
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $respuesta = json_decode(curl_exec($ch), true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        
        if ($httpCode == 200) {
            $mensaje = $respuesta["mensaje"];
        } else {
            $error = $respuesta["error"];
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
    <title>Editar Asignatura</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Editar Asignatura</h1>

    <?php

    if (isset($mensaje)) {
        echo "<p style='color: green;'>" . $mensaje;
        "</p>";
        header("Refresh: 3; url=index.php");
    }

    if (isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }

    if (isset($asignatura)) {
    ?>
        <form method="POST">
            <label for="nombre_asignatura">Nombre de la asignatura:</label>
            <input type="text" id="nombre_asignatura" name="nombre_asignatura" value="<?php echo htmlspecialchars($asignatura['datos']['nombre_asignatura']); ?>" required>

            <label for="creditos">Créditos:</label>
            <input type="number" id="creditos" name="creditos" value="<?php echo htmlspecialchars($asignatura['datos']['creditos']); ?>" required>
            <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($asignatura['datos']['id_asignatura']); ?>">
            <button type="submit">Actualizar</button>
        </form>
    <?php
    } else {
        echo '<p>Asignatura no encontrada.</p>';
    }
    ?>


    <a href="index.php" style="color:darkgreen">Volver al listado</a>
</body>

</html>