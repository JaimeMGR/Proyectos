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
        $lista=array(10,20,30);

        echo "$lista[0]<br>";
        echo "$lista[1]<br>";
        echo "$lista[2]<br>";
        $lista[2]=33;
        echo "$lista[2]<br>";
        $lista[]=48;
        echo "$lista[3]<br>";
        echo count($lista)." de tamaño de array";

        echo "<br>";

        $coche["marca"]="Mercedes";
        $coche["precio"]=30000;
        $coche["potencia"]="160CV";
        echo $coche['marca']."<br>";
        echo $coche['precio']."<br>";
        echo $coche['potencia']."<br>";

        echo $lista."<br>.$coche";

        
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
        $lista=array(10,20,30);

        echo "$lista[0]<br>";
        echo "$lista[1]<br>";
        echo "$lista[2]<br>";
        $lista[2]=33;
        echo "$lista[2]<br>";
        $lista[]=48;
        echo "$lista[3]<br>";
        echo count($lista)." de tamaño de array";

        echo "<br>";

        $coche["marca"]="Mercedes";
        $coche["precio"]=30000;
        $coche["potencia"]="160CV";
        echo $coche['marca']."<br>";
        echo $coche['precio']."<br>";
        echo $coche['potencia']."<br>";

        echo $lista."<br>.$coche";

        
    ?>
</body>
>>>>>>> Stashed changes
</html>