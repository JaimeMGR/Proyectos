<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Coches en venta</h1>
    <?php
        $coche="Mercedes";
        $precio=50000;
        $potencia="160CV";

        echo "<p><strong>Marca:</strong><em>$coche</em><br>
        <p><strong>Precio:</strong><em>$precio €</em><br>
        <p><strong>Potencia:</strong><em>$potencia</em><br>";


        echo "<hr>";
?>

        <?php
        $coche2="Audi";
        $precio2=30000;
        $potencia2="140CV";

        ?>
        <p><strong>Marca:</strong><em><?php print $coche ?></em><br>
        <p><strong>Precio:</strong><em><?php print $precio ?>€</em><br>
        <p><strong>Potencia:</strong><em><?php print $potencia?></em><br>
    
        <hr>

<table>
  <tr>
    <th>Marca</th>
    <th>Precio</th>
    <th>Potencia</th>
  </tr>
  <tr>
    <td><?php print $coche ?></td>
    <td><?php print $precio ?></td>
    <td><?php print $potencia ?></td>
  </tr>
  <tr>
    <td><?php print $coche2 ?></td>
    <td><?php print $precio2 ?></td>
    <td><?php print $potencia2 ?></td>
  </tr>
</table>
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
    <h1>Coches en venta</h1>
    <?php
        $coche="Mercedes";
        $precio=50000;
        $potencia="160CV";

        echo "<p><strong>Marca:</strong><em>$coche</em><br>
        <p><strong>Precio:</strong><em>$precio €</em><br>
        <p><strong>Potencia:</strong><em>$potencia</em><br>";


        echo "<hr>";
?>

        <?php
        $coche2="Audi";
        $precio2=30000;
        $potencia2="140CV";

        ?>
        <p><strong>Marca:</strong><em><?php print $coche ?></em><br>
        <p><strong>Precio:</strong><em><?php print $precio ?>€</em><br>
        <p><strong>Potencia:</strong><em><?php print $potencia?></em><br>
    
        <hr>

<table>
  <tr>
    <th>Marca</th>
    <th>Precio</th>
    <th>Potencia</th>
  </tr>
  <tr>
    <td><?php print $coche ?></td>
    <td><?php print $precio ?></td>
    <td><?php print $potencia ?></td>
  </tr>
  <tr>
    <td><?php print $coche2 ?></td>
    <td><?php print $precio2 ?></td>
    <td><?php print $potencia2 ?></td>
  </tr>
</table>
</body>
>>>>>>> Stashed changes
</html>