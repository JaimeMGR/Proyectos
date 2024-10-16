

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mostrar_puntuacion.css">
    <title>Resultados del Test de Tekken</title>
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
            "Dinosaurio",
            "Street Fighter X Tekken",
            "Tekken 5",
            "4",
            "Steve Fox",
            "Mokujin",
            "Xiaoyu",
            "Jun Kazama",
            "Kazuya Mishima",
            "Bryan Fury",
            "Mexicano"
        ];

        // Conseguimos el número total de preguntas y inicializamos las respuestas correctas a 0
        $puntaje = 0;
        $total = count($respuestas_correctas);

    ?>
<ol>
    <h2 id="Titulo">Comprobación de respuestas</h2>

        <?php
        // Mostrar las preguntas y las respuestas correctas/incorrectas
        for ($i = 1; $i <= $total; $i++) {
            // Recuperar la respuesta enviada por el usuario
            $respuesta_usuario = isset($_POST["respuesta_$i"]) ? $_POST["respuesta_$i"] : "No respondida";
            $respuesta_correcta = $respuestas_correctas[$i - 1];

            echo "<li>";
            echo "<strong>Pregunta $i:</strong> <br>";
            echo "Tu respuesta: $respuesta_usuario<br>";

            if ($respuesta_usuario == $respuesta_correcta) {
                echo "<span style='color:green;'>¡Correcto!</span>";
                $puntaje++;
            } else {
                echo "<span style='color:red;'>Incorrecto</span>";
            }

            echo "</li><br>";
        }
        ?>
    </ol>
    <br><br>
    <ol id="resultado">
<h1>Resultados del Test de Tekken</h1>
    <p style="text-align: center";>Has obtenido <?php echo $puntaje; ?> de <?php echo $total; ?> respuestas correctas.</p>

    <?php if ($puntaje == $total): ?>
        <p style="text-align: center">¡Perfecto! ¡Eres un maestro de Tekken!</p>
    <?php elseif ($puntaje > $total / 2): ?>
        <p style="text-align: center">¡Buen trabajo! Conoces bastante de Tekken.</p>
    <?php else: ?>
        <p style="text-align: center">Necesitas practicar más. ¡Sigue jugando a Tekken!</p>
    <?php endif; ?>
    </ol>

</body>
</html>
