<?php
include '../esencial/conexion.php';

// Extrae el valor del formulario usado para los filtros
$categorias = isset($_GET['filtro']) ? $_GET['filtro'] : "";

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
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda - Atarfe Fighting</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="../../js/header.js" defer></script>
  <!-- <script src="app.js" defer></script> -->
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
    <!-- filters -->
    <div class="filters ">
      <div class="filter-container">
        <h2 style="font-weight: bold;">Tienda</h2>
        <section style="text-align:center;">
          <?php
          if (isset($_SESSION["nombre"]) && $pagina_actual == "tienda.php" && $_SESSION["tipo"] == "admin") {
          ?>
            <a class="btn btn-warning" href="añadirproducto.php" class="btn">Añadir producto</a>

          <?php
          }
          ?>
        </section>
        <!-- filtros -->
        <form id="filter-form" method="GET" action="tienda.php">

          <label for="exampleFormControlSelect1">Categoría</label>
          <div class="input-group">
            <select class="form-control" id="filtro" name="filtro">
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
      </div>
      </form>
      <div class="toggle-container">
        <button class="toggle-cart btn">
          <i class="fas fa-shopping-cart ">Cesta</i>
        </button>
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
    <section class="products">
      <div class="products-container">
        <?php

        // Consulta para obtener las categorías, si la categoría es "Todos" no se hará ningún filtro, se debe de actualizar cada vez que marcan una categoria
        if ($categorias != null) {
          $sql = "SELECT id, nombre, companía, imagen, precio, Categoría FROM productos WHERE Categoría = '$categorias'";
          $result = $conexion->query($sql);

          $lista = [];

          if ($result->num_rows > 0) {
            // Almacenar productos en un array
            while ($row = $result->fetch_assoc()) {
              echo "Aqui<br>";
        ?>
              <article class="product">
                <div class="product-container" data-id="<?php echo $row['id']; ?>">
                  <img src="<?php echo $row['imagen']; ?>" class="product-img img" alt="<?php echo $row['nombre']; ?>">
                  <div class="product-icons">
                    <button class="product-cart-btn product-icon">
                      <i class="fas fa-shopping-cart"></i>
                    </button>
                  </div>
                </div>
                <footer>
                  <p class="product-name"><?php echo $row['nombre']; ?></p>
                  <h4 class="product-price"><?php echo number_format($row['precio'], 2); ?> €</h4>
                  <h4 class="single-product-company"><?php echo $row['companía']; ?></h4>
                  <?php
                  if (isset($_SESSION["nombre"]) && $pagina_actual == "tienda.php" && $_SESSION["tipo"] == "admin") {
                  ?>
                    <!-- Botón para eliminar producto -->
                    <a href='eliminarproducto.php?id=" <?php echo $row['id']; ?>"' class="btn btn-danger edit-product">Eliminar</a>
                    <!-- Botón para editar producto -->
                    <a href='editarproducto.php?id=" <?php echo $row['id']; ?>"' class="btn btn-warning edit-product">Editar</a>
                  <?php
                  }
                  ?>
                </footer>
              </article>
            <?php
              $lista[] = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'companía' => $row['companía'],
                'precio' => $row['precio'],
                'image' => $row['imagen']

              ];
            }
          }
        } else {
          $sql = "SELECT id, nombre, companía, imagen, precio, Categoría FROM productos";
          $result = $conexion->query($sql);

          $lista = [];

          if ($result->num_rows > 0) {
            // Almacenar productos en un array
            while ($row = $result->fetch_assoc()) {
            ?>
              <article class="product">
                <div class="product-container" data-id="<?php echo $row['id']; ?>">
                  <img src="<?php echo $row['imagen']; ?>" class="product-img img" alt="<?php echo $row['nombre']; ?>">
                  <div class="product-icons">
                    <button class="product-cart-btn product-icon">
                      <i class="fas fa-shopping-cart"></i>
                    </button>
                  </div>
                </div>
                <footer>
                  <p class="product-name"><?php echo $row['nombre']; ?></p>
                  <h4 class="product-price"><?php echo number_format($row['precio'], 2); ?> €</h4>
                  <h4 class="single-product-company"><?php echo $row['companía']; ?></h4>
                  <?php
                  if (isset($_SESSION["nombre"]) && $pagina_actual == "tienda.php" && $_SESSION["tipo"] == "admin") {
                  ?>
                    <!-- Botón para eliminar producto -->
                    <a href='eliminarproducto.php?id=" <?php echo $row['id']; ?>"' class="btn btn-danger edit-product">Eliminar</a>
                    <!-- Botón para editar producto -->
                    <a href='editarproducto.php?id=" <?php echo $row['id']; ?>"' class="btn btn-warning edit-product">Editar</a>
                  <?php
                  }
                  ?>
                </footer>
              </article>
        <?php
              $lista[] = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'companía' => $row['companía'],
                'precio' => $row['precio'],
                'image' => $row['imagen']

              ];
            }
          }
        }



        ?>
      </div>
      <!--alert-->
      <div class="alerta">

      </div>
    </section>

    <!-- Paginación -->
    <nav>
      <ul class="pagination justify-content-center">
        <?php
        // Botón "Anterior"
        if ($pagina_actual > 1): ?>
          <li class="page-item">
            <a class="btn btn-warning" href="?pagina=<?= $pagina_actual - 1 ?>">Anterior</a>
          </li>
        <?php endif; ?>

        <?php
        // Mostrar siempre la primera página
        if ($pagina_actual > 3): ?>
          <li class="page-item">
            <a class="btn btn-warning" href="?pagina=1">1</a>
          </li>
          <li class="page-item disabled">
            <span class="btn btn-warning">...</span>
          </li>
        <?php endif; ?>

        <?php
        // Mostrar la página anterior al actual, si existe
        if ($pagina_actual > 1): ?>
          <li class="page-item">
            <a class="btn btn-warning" href="?pagina=<?= $pagina_actual - 1 ?>"><?= $pagina_actual - 1 ?></a>
          </li>
        <?php endif; ?>

        <?php
        // Mostrar la página actual
        ?>
        <li class="page-item active">
          <span class="btn btn-danger"><?= $pagina_actual ?></span>
        </li>

        <?php
        // Mostrar la página posterior al actual, si existe
        if ($pagina_actual < $total_paginas): ?>
          <li class="page-item">
            <a class="btn btn-warning" href="?pagina=<?= $pagina_actual + 1 ?>"><?= $pagina_actual + 1 ?></a>
          </li>
        <?php endif; ?>

        <?php
        // Mostrar siempre la última página con puntos suspensivos
        if ($pagina_actual < $total_paginas - 2): ?>
          <li class="page-item disabled">
            <span class="btn btn-warning">...</span>
          </li>
          <li class="page-item">
            <a class="btn btn-warning" href="?pagina=<?= $total_paginas ?>"><?= $total_paginas ?></a>
          </li>
        <?php endif; ?>

        <?php
        // Botón "Siguiente"
        if ($pagina_actual < $total_paginas): ?>
          <li class="page-item">
            <a class="btn btn-warning" href="?pagina=<?= $pagina_actual + 1 ?>">Siguiente</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- modal -->
    <div class="modal">
      <button class="close-btn">
        <i class="fas fa-times"></i>
      </button>
      <div class="modal-content">
        <!-- content -->
        <img src="" class="main-img" alt="" />
        <h2 class="image-title">title</h2>
        <h3 class="image-alt">pr</h3>
      </div>
    </div>
  </main>
  <?php include '../esencial/footer.php' ?>
</body>

</html>