<?php
include '../esencial/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dietas - Atarfe Fighting</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
    <?php include '../esencial/header.php' ?>
    <main>
        <!-- Api Key:dfb17968739d1fb97df63edb5dc165b63f93c307 -->
<!-- Necesito crear una sección en la cual se podrán consultar dietas utilizando la api llamada wger cuya api key es dfb17968739d1fb97df63edb5dc165b63f93c307 -->
 <!-- Aquí comienza la sección para mostrar las dietas -->
 <h1 style="font-weight: bold; text-align: center">Dietas</h1>
 <div class="container">
    <div class="row">
        <?php
        // Aquí se haría la consulta a la api para obtener las dietas
        // y se mostrarían en la página web
        // Por ejemplo, se podría usar un fetch para obtener los datos y luego generar las cards con los datos obtenidos
        //...
        // Ejemplo de código para obtener los datos desde la API
        $url = 'https://wger.io/api/v2/food/?api_key=dfb17968739d1fb97df63edb5dc165b63f93c307';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        foreach ($data['results'] as $item) {
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<img src="'. $item['image']['url']. '" class="card-img-top" alt="'. $item['name']. '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'. $item['name']. '</h5>';
            echo '<p class="card-text">'. $item['description']. '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </main>
    <?php include '../esencial/footer.php' ?>

</body>

</html>
