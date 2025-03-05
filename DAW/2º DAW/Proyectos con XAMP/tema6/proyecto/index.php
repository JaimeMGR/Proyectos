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
    "Kazuya Mishima",
    "Taekwondo",
    "Jin Kazama",
    "The King of Iron Fist Tournament",
    "Kuma",
    "Jin Kazama",
    "Ogre",
    "1994",
    "Eddy Gordo",
    "Dinosaurio"
];

$puntaje = 0;
$total_preguntas = count($respuestas_correctas);

// Verificar respuestas
for ($i = 1; $i <= $total_preguntas; $i++) {
    if (isset($_POST["respuesta_$i"]) && $_POST["respuesta_$i"] == $respuestas_correctas[$i - 1]) {
        $puntaje++;
    }
}

// Redirigir a la página de resultados
header("Location: mostrar_puntaje.php?puntaje=$puntaje&total=$total_preguntas");
exit;
?>
</body>
</html>