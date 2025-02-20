<?php
include '../esencial/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <h2 style="font-weight: bold;">Socios</h2>
        <section style="text-align:center">
            <a class="btn btn-warning" href="register.php">Añadir socio</a>
        </section>
        <form class="formbuscar" method="post" action="buscasocio.php">
            <label for="busqueda">Buscar socio:</label>
            <input class="form-control" type="text" id="busqueda" name="busqueda" placeholder="Buscar por nombre, usuario, edad, teléfono...">
            <button class="btn btn-warning" type="button|submit">Buscar</button>
        </form>
        <div class="socio-container">
            <?php
            // Número máximo de resultados por página
            $resultados_por_pagina = 6;

            // Determinar la página actual
            $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            if ($pagina_actual < 1) $pagina_actual = 1;

            // Calcular el OFFSET para la consulta
            $offset = ($pagina_actual - 1) * $resultados_por_pagina;

            // Obtener el número total de socios
            $query_total = "SELECT COUNT(*) FROM socio";
            $stmt_total = $conexion->prepare($query_total);
            $stmt_total->execute();
            $stmt_total->bind_result($total_socios);
            $stmt_total->fetch();
            $stmt_total->close();

            // Calcular el número total de páginas
            $total_paginas = ceil($total_socios / $resultados_por_pagina);

            // Preparar la consulta con LIMIT y OFFSET
            $query = "SELECT id_socio, usuario, nombre, edad, telefono, foto FROM socio LIMIT ? OFFSET ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("ii", $resultados_por_pagina, $offset);

            // Ejecutar la consulta
            $stmt->execute();
            $stmt->bind_result($id_socio, $usuario, $nombre, $edad, $telefono, $foto);

            // Procesar los resultados
            if ($stmt->fetch()) {
                do {
                    echo "<div class='socio-card'>
                    <div class='socio-foto'><img src='" . "../../imagenes/" . $foto . "' alt='Foto de " . $nombre . "'></div>
                    <div class='socio-info'>
                    <h3>" . $nombre . "</h3>
                    <p><strong>Usuario:</strong> " . $usuario . "</p>
                    <p><strong>Edad:</strong> " . $edad . "</p>
                    <p><strong>teléfono:</strong> " . $telefono . "</p>
                    <a href='modificarsocio.php?id=$id_socio' type='button' class='btn btn-outline-success'>Modificar datos</a>
                    </div>
                    </div>";
                } while ($stmt->fetch());
            } else {
                echo "<p>No hay socios registrados.</p>";
            }

            // Cerrar la declaración
            $stmt->close();
            $conexion->close();
            ?>
        </div>
        <br>

        <!-- Paginación -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php
                // Botón "Anterior"
                if ($pagina_actual > 1): ?>
                    <li class="numero-pagina">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual - 1 ?>">Anterior</a>
                    </li>
                <?php endif; ?>

                <?php
                // Mostrar siempre la primera página
                if ($pagina_actual > 3): ?>
                    <li class="numero-pagina">
                        <a class="btn btn-warning" href="?pagina=1">1</a>
                    </li>
                    <li class="numero-pagina disabled">
                        <span class="btn btn-warning">...</span>
                    </li>
                <?php endif; ?>

                <?php
                // Mostrar la página anterior al actual, si existe
                if ($pagina_actual > 1): ?>
                    <li class="numero-pagina">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual - 1 ?>"><?= $pagina_actual - 1 ?></a>
                    </li>
                <?php endif; ?>

                <?php
                // Mostrar la página actual
                ?>
                <li class="numero-pagina active">
                    <span class="btn btn-danger"><?= $pagina_actual ?></span>
                </li>

                <?php
                // Mostrar la página posterior al actual, si existe
                if ($pagina_actual < $total_paginas): ?>
                    <li class="numero-pagina">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual + 1 ?>"><?= $pagina_actual + 1 ?></a>
                    </li>
                <?php endif; ?>

                <?php
                // Mostrar siempre la última página con puntos suspensivos
                if ($pagina_actual < $total_paginas - 2): ?>
                    <li class="numero-pagina disabled">
                        <span class="btn btn-warning">...</span>
                    </li>
                    <li class="numero-pagina">
                        <a class="btn btn-warning" href="?pagina=<?= $total_paginas ?>"><?= $total_paginas ?></a>
                    </li>
                <?php endif; ?>

                <?php
                // Botón "Siguiente"
                if ($pagina_actual < $total_paginas): ?>
                    <li class="numero-pagina">
                        <a class="btn btn-warning" href="?pagina=<?= $pagina_actual + 1 ?>">Siguiente</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

    </main>
    <?php include '../esencial/footer.php' ?>
</body>

</html>