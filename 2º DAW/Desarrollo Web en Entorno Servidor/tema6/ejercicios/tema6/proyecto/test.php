<!DOCTYPE html>
<html lang="es">
<head>
    <meta charºt="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Test de Tekken</title>
</head>
<body>
    <form action="mostrar_puntuacion.php" method="POST">
    <h1>¿Cuanto sabes sobre Tekken?</h1>
        <?php
        // Preguntas y respuestas
        $preguntas = [
            "¿Cuál es el nombre del protagonista principal de Tekken?" => ["Kazuya Mishima", "Jin Kazama", "Heihachi Mishima", "King"],
            "¿Cuál es el estilo de lucha de Hwoarang?" => ["Taekwondo", "Karate", "Capoeira", "Jiu-jitsu"],
            "¿Qué personaje es conocido por su poder de transformación demoníaca?" => ["Lei Wulong","Jin Kazama", "Paul Phoenix", "Hwoarang"],
            "¿Cuál es el nombre del torneo en Tekken?" => ["The King of Iron Fist Tournament", "World Martial Arts Tournament", "Tekken Championship", "Fight Club"],
            "¿Qué personaje es un oso?" => ["Kuma", "Marshall Law", "Roger", "Alex"],
            "¿Quién es el hijo de Kazuya Mishima?" => ["Jin Kazama", "Lars Alexandersson", "Lee Chaolan", "Paul Phoenix"],
            "¿Cuál es el nombre del jefe final en Tekken 3?" => ["Jinpachi Mishima", "Lee Chaolan", "Ogre", "Armor King"],
            "¿En qué año se lanzó el primer Tekken?" => ["1991", "1996", "1994", "1993"],
            "¿Qué personaje usa Capoeira como su estilo de lucha?" => ["Marshall Law", "Hwoarang","Eddy Gordo", "Steve Fox"],
            "¿Qué animal es Alex en Tekken?" => ["Dinosaurio", "Canguro", "Tigre", "Lobo"],
            "¿En que juego hacen colaboración con la saga Street Fighter?" => ["Tekken 3", "Street Fighter II", "Tekken X Street Fighter", "Street Fighter X Tekken"],
            "¿En que juego de la saga el jefe final es Jinpachi Mishima?" => ["Tekken Tag Tournament 2", "Tekken 5", "Tekken 7", "Tekken 4"],
            "¿Cuantos hijos tiene Heihachi Mishima?" => ["3", "2", "4", "1"],
            "¿Quien fué el ganador del cuarto torneto Tekken?" => ["Kazyua Mishima", "Steve Fox", "Jin Kazama", "Paul Phoenix"],
            "¿Que personaje puede imitar los movimientos de todos en Tekken 3?" => ["Xiaoyu", "Jin Kazama", "Mokujin", "Ogre"],
            "¿Que personaje dice la siguiente frase:'A veces un intercambio de golpes puede resultar revelador...'?" => ["King", "Devil Jin", "Xiaoyu", "Jimpachi Mishima"],
            "¿Quien es la madre de Jin?" => ["Nina Williams","Kazumi Mishima","Jun Kazama","Asuka Kazama"],
            "¿Quien ganó el primer torneo Tekken?" => ["King", "Steve Fox", "Kazuya Mishima", "Jin Kazama"],
            "¿Quien es el archienemigo de Yoshimitsu?" => ["Kazuya Mishima","Bryan Fury","Miguel","Jaycee" ],
            "¿De que nacionalidad es King de Tekken 8?" => ["Español","Americano","Japonés","Mexicano"],
        ];

        $i = 1;
        foreach ($preguntas as $pregunta => $respuestas) {
            echo "<p><strong>$i. $pregunta</strong></p>";
            foreach ($respuestas as $indice => $respuesta) {
                echo "<input type='radio' name='respuesta_$i' value='$respuesta' required> $respuesta<br>";
            }
            $i++;
        }
        ?>
        <input type="submit" value="Enviar respuestas">
    </form>
</body>
</html>
