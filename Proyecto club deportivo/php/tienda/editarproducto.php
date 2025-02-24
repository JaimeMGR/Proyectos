<?php

$id_producto = $_GET['id'];

// URL del backend (API) con parámetros de paginación
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 10;
$apiUrl = "http://localhost/Atarfe_Fighting/php/tienda/api_crud/api.php?id=$id_producto"; // Cambia esta URL al endpoint correcto
// echo $apiUrl;

// Si el formulario ha sido enviado, actualizamos la asignatura
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre_asignatura']) && isset($_POST['creditos'])) {
        $id_asignatura= (int)$_POST['id'];
        $nombre_asignatura = $_POST['nombre_asignatura'];
        $creditos = (int) $_POST['creditos'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'id_asignatura' => $id_asignatura,
            'nombre_asignatura' => $nombre_asignatura,
            'creditos' => $creditos
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $respuesta = json_decode(curl_exec($ch), true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        
        if ($httpCode == 200) {
            $mensaje = $respuesta["mensaje"];
        } else {
            $error = $respuesta["error"];
        }
    } else {
        $error = "Todos los campos son requeridos.";
    }
}
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
        <?php
        if (isset($_SESSION["nombre"]) && $pagina_actual == "editarproducto.php" && $_SESSION["tipo"] == "admin") {
        ?>
            <h1>Editar producto</h1>
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

                // Procesamos y mostramos las productos
                foreach ($productosDisponibles as $producto) {

                    echo '            <form action="api/editar.php?id=' . $producto['id_producto'] . '" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $producto['id_producto'] . '">

                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" value="' . $producto['nombre_producto'] . '">

                        <label for="compania">Compañía:</label>
                        <input type="text" name="compania" id="compania" value="' . $producto['compania'] . '"

                        <label for="precio">Precio (€):</label>
                        <input type="number" step="0.01" name="precio" id="precio" value="' . $producto['precio'] . '">

                        <label for="imagen">Imagen:</label>
                        <input type="file" name="imagen"  id="imagen" accept="*.jpg value="' . $producto['precio'] . '"">

                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria">
                            <option value="Todos">Todos</option>
                            <option value="Guantes">Guantes</option>
                            <option value="Pantalones">Pantalones</option>
                            <option value="Rodilleras">Rodilleras</option>
                            <option value="Zapatillas">Zapatillas</option>
                            <option value="Tobilleras">Tobilleras</option>
                            <option value="Bucales">Bucales</option>
                            <option value="Suplementos">Suplementos</option>
                        </select>

                        <button type="submit" class="add">Añadir producto</button>
                    </form>';
                }
            } else {
                header("Location: ../../index.php");
            }
        } elseif (isset($_SESSION["nombre"]) && $pagina_actual == "editarproducto.php" && $_SESSION["tipo"] == "socio") {
            header("Location: tienda.php");
        } else {
            header("Location: ../../index.php");
        }
        ?>
    </main>
    <?php include '../esencial/footer.php' ?>
</body>

</html>