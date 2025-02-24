<?php
include '../esencial/conexion.php';

// URL del backend (API) con parámetros de paginación
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 10;
// Cambia esta URL al endpoint correcto

if (isset($_GET['categoria'])) {
  $categoria = $_GET['categoria'];
  $apiUrl = "http://localhost/Atarfe_Fighting/php/tienda/api_crud/api.php?page=$page&limit=$limit&categoria=$categoria";
} else if (isset($_GET['nombre_producto'])) {
  $nombre_producto = $_GET['nombre_producto'];
  $apiUrl = "http://localhost/Atarfe_Fighting/php/tienda/api_crud/api.php?page=$page&limit=$limit&nombre_producto=$nombre_producto";
} else if (isset($_GET['precio'])) {
  $precio = $_GET['precio'];
  $apiUrl = "http://localhost/Atarfe_Fighting/php/tienda/api_crud/api.php?page=$page&limit=$limit&precio=$precio";
} else {
  $apiUrl = "http://localhost/Atarfe_Fighting/php/tienda/api_crud/api.php?page=$page&limit=$limit";
}

// Extrae el valor del formulario usado para los filtros
$categorias = isset($_GET['Categoria']) ? $_GET['Categoria'] : null;

// Número máximo de productos por página
$max_productos_por_pagina = 8;

// Número de página actual (por defecto es 1)
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el desplazamiento para la paginación
$offset = ($pagina_actual - 1) * $max_productos_por_pagina;

// Consulta para contar el total de productos
$query_count = "SELECT COUNT(*) FROM productos";
$result_count = $conexion->query($query_count);
$total_productos = $result_count->fetch_row()[0];

// Calcular el total de páginas necesarias
$total_paginas = ceil($total_productos / $max_productos_por_pagina);

$lista = [];


// echo $apiUrl;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda - Atarfe Fighting</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="../../js/header.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css" />
  <script type="text/javascript" src="lista_productos.js"></script>
  <script type="text/javascript" defer src="app.js"></script>
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <!-- styles css -->
</head>

<body style="background:#f4f4f9">
  <?php include '../esencial/header.php' ?>
  <main>
    <?php
    if (isset($_SESSION["nombre"]) && $pagina_actual == "tienda.php" && $_SESSION["tipo"] == "admin") {
    ?>
      <section style="text-align: center;">
        <h1>Productos</h1>

        <a href="añadirproducto.php" class="btn btn-warning" style="margin-bottom:10px;">Añadir producto</a>

        <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
        ]);

        $respuesta = json_decode(curl_exec($ch), true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);


        if ($httpCode == 200) {
          $productosDisponibles = $respuesta["datos"];
          $paginacion = $respuesta["paginacion"];

          $actual = $paginacion['actual'];
          $total = $paginacion['paginas'];
          $limite = $paginacion['limite'];

          echo '<table>';
          echo '<thead>';
          echo '<tr>';
          echo '<th>ID</th>';
          echo '<th>Nombre de producto</th>';
          echo '<th>Compañía</th>';
          echo '<th>Imagen</th>';
          echo '<th>precio</th>';
          echo '<th>Categoría</th>';
          echo '<th>Acciones</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';

          // Procesamos y mostramos las productos
          foreach ($productosDisponibles as $producto) {
            echo '<tr>';
            echo '<td>' . $producto['id_producto'] . '</td>';
            echo '<td>' . $producto['nombre_producto'] . '</td>';
            echo '<td>' . $producto['compania'] . '</td>';
            echo '<td><img src="' . $producto['imagen'] . '" width="100" height="100"></td>';
            echo '<td>' . $producto['precio'] . '</td>';
            echo '<td>' . $producto['categoria'] . '</td>';
            echo '<td>';
            echo '<a href="editarproducto.php?id=' . $producto['id_producto'] . '" class="edit">Editar</a><br>';
            echo '<a href="api/borrar.php?id=' . $producto['id_producto'] . '" class="delete" onclick="return confirm(\'¿Seguro que quieres borrar esta producto?\');">Borrar</a>';
            echo '</td>';
            echo '</tr>';
          }

          echo '</tbody>';
          echo '</table>';



          echo '<div class="pagination">';

          // Enlace a la página anterior (si no estamos en la primera)
          if ($actual > 1) {
            echo '<a class="paginacion btn btn-warning" href="?page=' . ($actual - 1) . '&limit=' . $limite . '">Anterior</a>';
          }

          // Enlaces a las páginas
          for ($i = 1; $i <= $total; $i++) {
            if ($i == $actual) {
              echo '<span class="current">' . $i . '</span>';
            } else {
              echo '<a class="paginacion btn btn-warning" href="?page=' . $i . '&limit=' . $limite . '">' . $i . '</a>';
            }
          }

          // Enlace a la siguiente página (si no estamos en la última)
          if ($actual < $total) {
            echo '<a class="paginacion btn btn-warning" href="?page=' . ($actual + 1) . '&limit=' . $limite . '">Siguiente</a>';
          }

          echo '</div>';
        } else {
          echo "<p>" . $respuesta["error"] . "</p>";
        }
        echo "</section>";
        // Mostrar los controles de paginación


      } elseif (isset($_SESSION["nombre"]) && $pagina_actual == "tienda.php" && $_SESSION["tipo"] == "socio") {
        ?>

        <h2 style="font-weight: bold;">Tienda</h2>
        <!-- filtros -->
        <h3 style="font-weight: bold;">Filtros</h3>

        <div class="filters ">
          <div class="filter-container"></div>
          <div class="filtros-container">
            <form id="filter-form" method="GET" action="tienda.php">

              <label for="Categoía">Categoría</label>
              <div class="input-group">
                <select class="form-control" id="categoria" name="categoria">
                  <option value="" hidden>Todos</option>
                  <option value="Guantes">Guantes</option>
                  <option value="Pantalones">Pantalones</option>
                  <option value="Rodilleras">Rodilleras</option>
                  <option value="Zapatillas">Zapatillas</option>
                  <option value="Tobilleras">Tobilleras</option>
                  <option value="Bucales">Bucales</option>
                  <option value="Suplementos">Suplementos</option>
                </select>
                <button type="submit" class="btn btn-warning">Filtrar</button>
              </div>


            </form>

            <form id="filter-form" method="GET" action="tienda.php">

              <label for="Nombre">Nombre</label>
              <div class="input-group">
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del producto">
                <button type="submit" class="btn btn-warning">Filtrar</button>
              </div>


            </form>

            <form id="filter-form" method="GET" action="tienda.php">

              <label for="Precio">Precio</label>
              <div class="input-group">
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio mínimo">

                <button type="submit" class="btn btn-warning">Filtrar</button>
              </div>


            </form>
          </div>
          </form>
          <div class="toggle-container">
            <button class="toggle-cart btn">
              <i class="fas fa-shopping-cart ">Cesta</i>
            </button>
          </div>
        </div>
        </div>


        <!-- cart -->
        <div class="cart-overlay">
          <aside class="cart">
            <button class="cart-close">
              <i class="fas fa-times"></i>
            </button>
            <header>
              <h3 class="text-slanted">Añadido hasta ahora</h3>
            </header>
            <!-- cart items -->
            <div class="cart-items"></div>
            <footer>
              <!-- muestra el precio total -->
              <h3 class="cart-total">Total: <span class="total-price">

                </span></h3>
              <button class="cart-checkout btn btn-danger">vaciar carro</button>
              <button class="cart-checkout btn btn-light">Tramitar pedido</button>
            </footer>
          </aside>
        </div>

        <!-- products -->
        <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
        ]);

        $respuesta = json_decode(curl_exec($ch), true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // var_dump($respuesta);

        curl_close($ch);


        if ($httpCode == 200) {
          $productosDisponibles = $respuesta["datos"];
          $paginacion = $respuesta["paginacion"];

          $actual = $paginacion['actual'];
          $total = $paginacion['paginas'];
          $limite = $paginacion['limite'];

          // Procesamos y mostramos las productos
        ?>
          <!-- products -->
          <section class="products">
            <div class="products-container">
              <?php
              foreach ($productosDisponibles as $producto) {
              ?>
                <article class="product">
                  <div class="product-container" data-id="<?php echo $producto['id_producto']; ?>">
                    <img src="<?php echo $producto['imagen']; ?>" class="product-img img" alt="<?php echo $producto['nombre_producto']; ?>">
                    <div class="product-icons">
                      <button class="product-cart-btn product-icon">
                        <i class="fas fa-shopping-cart"></i>
                      </button>
                    </div>
                  </div>
                  <footer>
                    <p class="product-name"><?php echo $producto['nombre_producto']; ?></p>
                    <h4 class="product-price"><?php echo number_format($producto['precio'], 2); ?> €</h4>
                    <h4 class="single-product-company"><?php echo $producto['compania']; ?></h4>

                  </footer>
                </article>
              <?php

              }
              ?>
            </div>
          </section>





          <div class="pagination">
            <?php
            // Enlace a la página anterior (si no estamos en la primera)
            if ($actual > 1) {
              echo '<a class="paginacion btn btn-warning" href="?page=' . ($actual - 1) . '&limit=' . $limite . '">Anterior</a>';
            }

            // Enlaces a las páginas
            for ($i = 1; $i <= $total; $i++) {
              if ($i == $actual) {
                echo '<span class="current btn btn-warning">' . $i . '</span>';
              } else {
                echo '<a class="paginacion btn btn-warning" href="?page=' . $i . '&limit=' . $limite . '">' . $i . '</a>';
              }
            }

            // Enlace a la siguiente página (si no estamos en la última)
            if ($actual < $total) {
              echo '<a class="paginacion btn btn-warning" href="?page=' . ($actual + 1) . '&limit=' . $limite . '">Siguiente</a>';
            }

            ?></div><?php
                  } else {
                    echo "<p>" . $respuesta["error"] . "</p>";
                  }

                  // Mostrar los controles de paginación

                    ?>

        <!--alert-->
        <div class="alerta">

        </div>

      </section>
  </main>


<?php
      } else {
        header("Location: ../../index.php");
      }
?>
</main>
<?php include '../esencial/footer.php' ?>
</body>

</html>