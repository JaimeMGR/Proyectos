<?php
include '../esencial/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2>Servicios</h2>
        <section style="text-align:center">
            <a class="btn btn-warning" href="añadirservicio.php">Añadir servicios</a>
        </section>
        </section>
        <form class="formbuscar" method="post" action="buscarservicio.php">
            <label for="busqueda">Buscar servicio:</label>
            <input class="form-control" type="text" id="busqueda" name="busqueda" placeholder="Buscar por nombre...">
            <button class="btn btn-warning" type="button|submit">Buscar</button>
        </form>
        <?php
        // Preparar la consulta con una declaración preparada
        $query = "SELECT codigo_servicio, descripcion, duracion, imagen, precio FROM servicio";
        $stmt = $conexion->prepare($query);

        // Ejecutar la consulta
        $stmt->execute();

        // Enlazar las variables para recibir los resultados
        $stmt->bind_result($codigo_servicio, $descripcion, $duracion, $imagen, $precio);

        $contador = 0;
        // Procesar los resultados
        if ($stmt->fetch()) {
            do {
                $contador++;
        ?>

                <div class="accordion" style="width:100%;" id="accordion<?php echo $contador ?>">
                    <div class="accordion-<?php echo $contador ?>" style="width:100%;">
                        <h2 class="accordion-header" id="heading<?php echo $contador ?>">
                            <button class="btn btn-danger" style="border-radius:5px;width:100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $contador ?>" aria-expanded="false" aria-controls="collapse<?php echo $contador ?>">
                                <h2 class='servicio-title'><?php echo $descripcion ?></h2>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $contador ?>" style="background:#dfdfdf; width: 100%;" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $contador ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="width:100%;">
                                <div class='servicio-image' style="width:100%;height:30% "><img src="<?php echo $imagen ?>" alt='<?php $descripcion ?>'></div>
                                <div class='servicio-content' style="text-align:center;width:auto">

                                    <p class='servicio-timetable' style="color:black"><strong> Precio mensual: </strong> <?php echo $precio ?> €</p>
                                    <p style="color:black"><strong>Duración: </strong><?php echo $duracion ?> minutos </p>
                                    <a style='color:black; width:60%;margin-left:20%;' href='modificarservicio.php?id=<?php echo $codigo_servicio ?>' type='button' class='btn btn-outline-success'>Modificar datos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
        <?php
            } while ($stmt->fetch());
        } else {
            echo "<p>No hay noticias disponibles.</p>";
        }


        // Cerrar la declaración y la conexión
        $stmt->close();
        $conexion->close();
        ?>

    </main>
    <?php include '../esencial/footer.php' ?>
</body>

</html>