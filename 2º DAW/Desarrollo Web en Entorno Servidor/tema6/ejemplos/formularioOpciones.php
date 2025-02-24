<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $radio = $_POST["eligeuno"];

        echo "Has seleccionado la opción $radio<br>";

        if(isset($_POST["EligeA"])){
           $checboxA=$_POST["EligeA"];
            echo "En el primer checkbox has seleccionado: $checboxA<br>";
        }

        if(isset($_POST["EligeB"])){
            $checboxB=$_POST["EligeB"];
             echo "En el primer checkbox has seleccionado: $checboxB<br>";
         }
    ?>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $radio = $_POST["eligeuno"];

        echo "Has seleccionado la opción $radio<br>";

        if(isset($_POST["EligeA"])){
           $checboxA=$_POST["EligeA"];
            echo "En el primer checkbox has seleccionado: $checboxA<br>";
        }

        if(isset($_POST["EligeB"])){
            $checboxB=$_POST["EligeB"];
             echo "En el primer checkbox has seleccionado: $checboxB<br>";
         }
    ?>
</body>
>>>>>>> Stashed changes
</html>