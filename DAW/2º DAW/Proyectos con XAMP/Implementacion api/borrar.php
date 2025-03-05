<?php

// Si el ID está presente, realizar la eliminación
if (isset($_GET['id'])) {

    $id_asignatura = (int)$_GET['id'];
    $apiUrl = 'http://localhost/academia/api.php?id='.$id_asignatura;
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');  // Método DELETE
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $respuesta = json_decode(curl_exec($ch), true);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    if ($httpCode == 200) {
        header("Location: index.php");
    } else {
        echo $respuesta["error"];
    }
} else {
    echo "ID no indicado para eliminar.";
}
