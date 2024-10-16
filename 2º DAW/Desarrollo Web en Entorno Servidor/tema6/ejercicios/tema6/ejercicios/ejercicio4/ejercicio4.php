<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Respuestas correctas
$respuestas_correctas = [
    'pregunta1' => ['Po', 'Tinki Wink'],
    'pregunta2' => ['Perros', 'Gatos'],
    'pregunta3' => ['Giratina', 'Palkia'],
    'pregunta4' => ['JavaScript'],
    'pregunta5' => ['Europa', 'África'],
    'pregunta6' => ['Rojo', 'Blanco', 'Verde'],
    'pregunta7' => ['Marte', 'Júpiter'],
    'pregunta8' => ['Rock', 'Flamenco'],
    'pregunta9' => ['Delfín', 'Tiburón', 'Ballena'],
    'pregunta10' => ['Manzana', 'Plátano']
];

// Inicializar variables
$nota = 0;
$total_preguntas = count($respuestas_correctas);
$errores = [];

// Verificar respuestas del usuario
foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
    if (isset($_POST[$pregunta])) {
        $respuesta_usuario = $_POST[$pregunta];
        // Ordenar los arrays para comparar
        sort($respuesta_usuario);
        sort($respuesta_correcta);
        
        if ($respuesta_usuario == $respuesta_correcta) {
            $nota++;
        } else {
            $errores[$pregunta] = $respuesta_correcta;
        }
    } else {
        // Si no se responde una pregunta
        $errores[$pregunta] = $respuesta_correcta;
    }
}

// Calcular la nota en porcentaje
$nota_final = ($nota / $total_preguntas) * 10;

// Mostrar los resultados
echo "<h1>Resultados del examen</h1>";
echo "<p>Has obtenido un $nota_final</p>";

if (!empty($errores)) {
    echo "<h2>Respuestas incorrectas:</h2>";
    foreach ($errores as $pregunta => $respuesta_correcta) {
        echo "<p><strong>Pregunta:</strong> $pregunta</p>";
        echo "<p>Respuesta(s) correcta(s): " . implode(', ', $respuesta_correcta) . "</p>";
    }
} else {
    echo "<p>¡Felicidades! Has acertado todas las preguntas.</p>";
}
?>
</body>
</html>