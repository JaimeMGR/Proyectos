<?php
// Inicializar cURL
$ch = curl_init();

// URL de la API
$url = 'http://www.rtve.es/api/noticias.json';

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json
    Authorization: Bearer YOUR_API_TOKEN'
));
// Ejecutar la solicitud
$respuesta = curl_exec($ch);


if ($httpCode != 200) {
    echo "Error:" . $httpCode;
} else {
    // Convertir la respuesta JSON a un array de PHP
    $datos = json_decode($respuesta, true);
    // Mostrar los datos (o procesarlos como sea necesario)
    print_r($datos);
}
// Cerrar la sesión de cURL
curl_close($ch);
