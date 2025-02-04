<?php
include '../esencial/conexion.php';

// Número máximo de noticias por página
$max_noticias_por_pagina = 4;

// Número de página actual (por defecto es 1)
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el desplazamiento para la paginación
$offset = ($pagina_actual - 1) * $max_noticias_por_pagina;

// Realizar la consulta para contar el total de noticias
$query_count = "SELECT COUNT(*) FROM noticia";
$result_count = $conexion->query($query_count);
$total_noticias = $result_count->fetch_row()[0];

// Calcular el total de páginas necesarias
$total_paginas = ceil($total_noticias / $max_noticias_por_pagina);

// Realizar la consulta para obtener las noticias de la página actual con límite y desplazamiento
$query = "SELECT id_noticia, titulo, contenido, imagen, fecha_publicacion FROM noticia ORDER BY fecha_publicacion DESC LIMIT $max_noticias_por_pagina OFFSET $offset";
$stmt = $conexion->prepare($query);
$stmt->execute();
$stmt->bind_result($id_noticia, $titulo, $contenido, $imagen, $fecha_publicacion);
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
        <h2 style="font-weight: bold;">Noticias</h2>
        <?php if (isset($_SESSION["nombre"]) && $pagina_actual == "socios.php" && $_SESSION["tipo"] == "admin") { ?>
            <section style="text-align:center;">
                <a class="btn btn-warning" href="añadirnoticia.php" class="btn">Redactar noticia</a>
            </section>
        <?php } ?>
        <br>

        <div class="noticias-container">
            <?php
            if ($stmt->fetch()) {
                do {
                    echo "<div class='noticia-item'>";
                    echo "<div class='noticia-image' ><img loading='lazy' src='" . '../../imagenes/' . $imagen . "' alt='" . $titulo . "'></div>";
                    echo "<div class='btn btn-danger' style='width:50%'>";
                    echo "<h3 class='noticia-title'>" . $titulo . "</h3>";
                    // Limitar el contenido de la noticia a 30 caracteres
                    $contenido_resumido = substr($contenido, 0, 30) . '...';
                    echo "<p style='color:white;'>" . $contenido_resumido . "</p>";
                    echo "<a style='color:white;' href='noticiaentera.php?id=$id_noticia'>Leer más...</a>";
                    echo "<br>";
                    echo "<small>Publicado el: " . $fecha_publicacion . "</small>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
                } while ($stmt->fetch());
            } else {
                echo "<p>No hay noticias disponibles.</p>";
            }
            $stmt->close();
            $conexion->close();
            ?>
        </div>

        <!-- Paginación -->
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Botón "Anterior" -->
                <?php if ($pagina_actual > 1): ?>
                    <li class="page-item">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual - 1 ?>">Anterior</a>
                    </li>
                <?php endif; ?>

                <!-- Mostrar primera página con puntos suspensivos si es necesario -->
                <?php if ($pagina_actual > 3): ?>
                    <li class="page-item">
                        <a class="btn btn-warning" href="?pagina=1">1</a>
                    </li>
                    <li class="page-item disabled">
                        <span class="btn btn-warning">...</span>
                    </li>
                <?php endif; ?>

                <!-- Páginas cercanas a la página actual -->
                <?php if ($pagina_actual > 1): ?>
                    <li class="page-item">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual - 1 ?>"><?= $pagina_actual - 1 ?></a>
                    </li>
                <?php endif; ?>

                <!-- Página actual -->
                <li class="page-item active">
                    <span class="btn btn-secondary"><?= $pagina_actual ?></span>
                </li>

                <?php if ($pagina_actual < $total_paginas): ?>
                    <li class="page-item">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual + 1 ?>"><?= $pagina_actual + 1 ?></a>
                    </li>
                <?php endif; ?>

                <!-- Mostrar última página con puntos suspensivos si es necesario -->
                <?php if ($pagina_actual < $total_paginas - 2): ?>
                    <li class="page-item disabled">
                        <span class="btn btn-warning">...</span>
                    </li>
                    <li class="page-item">
                        <a class="btn btn-warning" href="?pagina=<?= $total_paginas ?>"><?= $total_paginas ?></a>
                    </li>
                <?php endif; ?>

                <!-- Botón "Siguiente" -->
                <?php if ($pagina_actual < $total_paginas): ?>
                    <li class="page-item">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual + 1 ?>">Siguiente</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </main>
    <?php include '../esencial/footer.php' ?>
</body>

</html>