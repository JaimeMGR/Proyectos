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
    <script src="../../js/header.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2>Servicios</h2>
        <?php
        if (isset($_SESSION["nombre"]) && $pagina_actual == "servicios.php" && $_SESSION["tipo"] == "admin") {
        ?>
            <section style="text-align:center">
                <a class="btn btn-warning" href="añadirservicio.php">Añadir servicios</a>
            </section>
        <?php
        }
        ?>
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

                <div class="accordion" id="accordion<?php echo $contador ?>">
                    <header class="header" style="margin-left:10%;width:80%">
                        <h2 class='servicio-title' style="text-transform:uppercase;font"><?php echo $descripcion ?></h2>

                    </header>
                    <div style="background:#dfdfdf; margin-left:10%;width:80%" class="accordion-collapse" aria-labelledby="heading<?php echo $contador ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="width:80%;margin-left: 10%;">
                            <div class='servicio-image' style="width:100%;"><img loading='lazy' src="<?php echo $imagen ?>" alt='<?php $descripcion ?>'></div>
                            <div class='servicio-content' style="text-align:center;width:auto">

                                <p class='servicio-timetable' style="color:black"> Clases de lunes a viernes a las <?php echo $precio ?></p>
                                <p style="color:black"> Duración: <?php echo $duracion ?> minutos </p>
                                <?php if (isset($_SESSION["nombre"]) && $pagina_actual == "servicios.php" && $_SESSION["tipo"] == "admin") { ?>
                                    <a style='color:black; width:60%;margin-left: 20%;margin-right:20%' href='modificarservicio.php?id=<?php echo $codigo_servicio ?>' type='button' class='btn btn-outline-success'>Modificar datos</a>
                                <?php
                                }
                                ?>
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