<?php
include '../esencial/conexion.php';

$id_socio = $_GET['id'];

// Preparar la consulta con una declaración preparada
$query = "SELECT telefono, nombre, contrasena, usuario, edad, foto FROM socio WHERE id_socio = $id_socio";
$stmt = $conexion->prepare($query);

// Ejecutar la consulta
$stmt->execute();

// Enlazar las variables para recibir los resultados
$stmt->bind_result($telefono, $nombre, $contrasena, $usuario, $edad, $imagen);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/modificarsocio.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h1 style="font-weight: bold; text-align:center">Modificar datos del usuario</h1>
        <?php if ($stmt->fetch()) {
            do {

                // Procesar los resultados

                echo "<div class='socio-card-modificar'>
                <div class='socio-foto'><img src='" . "../../imagenes/" . $imagen . "' alt='Imagen de " . $nombre . "'></div>
                <div class='socio-info'>
                <h4 class='text-md-center'>" . $nombre . "</h4>
                <h3 class='text-md-center'> " . $usuario . "</h3>
                <h3 class='text-md-center'>Edad: " . $edad . "</h3>
                <h3 class='text-md-center'> " . $telefono . "</h3>
                <img class='text-md-center'> " . $imagen . "</img>

                <hr>

                <form action='modificar_datos_socio.php?id=$id_socio' method='post' enctype='multipart/form-data'>
                <label  for='nombre'>Nombre</label> 
                <input type='hidden' id='id_socio' name='id_socio' value='" . $id_socio . "'>
                <input type='text' id='nombre' name='nombre' placeholder='$nombre'>
                <label  for='usuario'>Usuario</label> 
                <input type='text' id='usuario' name='usuario' placeholder='$usuario'>
                <label for='edad' >Edad</label>
                <input type='number' id='edad' name='edad' placeholder='$edad'>
                <label  for='telefono'>Teléfono</label> 
                <input type='text' id='telefono' name='telefono' placeholder='$telefono'>
                <label  for='imagen'>imagen</label> 
                <input type='file' id='imagen' name='imagen'>
                <hr>
                <button class='btn btn-warning' type='submit'>Modificar</button>
                </form>
                <div id='error-container' style='color: red; font-size: 14px; margin-top: 10px;'></div>
                </div>
                </div>";
            } while ($stmt->fetch());
        } else {
            echo "<p>No hay socios registrados.</p>";
        }




        // Cerrar la declaración y la conexión
        $stmt->close();
        $conexion->close();
        ?>


        </div>
    </main>
    <?php include '../esencial/footer.php' ?>

</body>

</html>