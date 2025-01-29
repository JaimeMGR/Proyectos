<?php

// Configuración de la API
$apiUrl = "https://api.spoonacular.com/mealplanner";
$apiKey = "78490cf9e68647a78eb6a202b8b7ab5e"; // Tu clave de API
$username = "jaimemg1312@gmail.com"; // Reemplaza con tu username de Spoonacular
$startDate = date("Y-m-d"); // Fecha de inicio (hoy)
$hash = "78490cf9e68647a78eb6a202b8b7ab5e"; // Reemplaza con tu hash privado

// Construcción del endpoint
$url = "$apiUrl/$username/week/$startDate?apiKey=$apiKey&hash=$hash";

// Llamada a la API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($httpCode >= 200 && $httpCode < 300) {
    $mealPlan = json_decode($response, true);

    echo "<h1>Plan de comidas semanal (Dieta Mediterránea)</h1>";

    foreach ($mealPlan['days'] as $day) {
        echo "<h2>Día " . htmlspecialchars($day['day']) . "</h2>";

        foreach ($day['meals'] as $meal) {
            echo "<h3>" . htmlspecialchars($meal['title']) . "</h3>";
            echo "<p>ID de la receta: " . $meal['id'] . "</p>";
            echo "<a href='" . $meal['sourceUrl'] . "' target='_blank'>Ver receta</a><br><br>";
        }

        echo "<h4>Información Nutricional</h4>";
        echo "<p>Calorías: " . $day['nutritionSummary']['nutrients'][0]['amount'] . " kcal</p>";
        echo "<p>Proteínas: " . $day['nutritionSummary']['nutrients'][1]['amount'] . " g</p>";
        echo "<p>Grasas: " . $day['nutritionSummary']['nutrients'][2]['amount'] . " g</p>";
        echo "<p>Carbohidratos: " . $day['nutritionSummary']['nutrients'][3]['amount'] . " g</p>";
        echo "<hr>";
    }
} else {
    echo "Error al obtener el plan de comidas.";
}

?>
