<?php
// Inicializar cURL
$ch = curl_init();

// URL de la API
$url = 'http://localhost/academia/api.php';

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

// Ejecutar la solicitud
$respuesta = curl_exec($ch);

// Obtener el código de respuesta HTTP
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode != 200) {
    echo "Error: " . $httpCode;
} else {
    // Convertir la respuesta JSON a un array de PHP
    $datos = json_decode($respuesta, true);
    // Mostrar los datos (o procesarlos como sea necesario)
    print_r($datos);
}

// Cerrar la sesión de cURL
curl_close($ch);
?>
