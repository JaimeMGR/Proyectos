<?php
// Encabezados para permitir CORS
header("Access-Control-Allow-Origin: *"); // Permite todas las solicitudes de origen
header("Content-Type: application/json"); // Establecer tipo de contenido en JSON

// Configuración de la base de datos
require "config.php";
require "funciones.php";

try {
    $conn = conectar($nombre_host, $nombre_usuario, $password_db, $nombre_db);
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error al conectar con la base de datos"]);
    die();
}

$metodo = $_SERVER["REQUEST_METHOD"];

if ($metodo == "GET") {
    $precio_limite = $_GET["price"];
    $busqueda_nombre = $_GET["nombre"];



    if (is_numeric($precio_limite)) {
        $precio_limite = (float)$precio_limite;
    } else {
        http_response_code(400); //bad request
        echo json_encode(["error" => "El precio tiene que ser un número float"]);
        die();
    }

    $condicion_filtro = "";

    if (isset($busqueda_nombre)) {
        $condicion_filtro .= $condicion_filtro == "" ? " title LIKE ?" :
            "AND title LIKE ?";
    }

    if (isset($marca)) {
        $condicion_filtro .= $condicion_filtro == "" ? " company LIKE?" :
             "AND company LIKE?";
    }


    if($condicion_filtro!=""){
        $consulta="SELECT * FROM $tabla_muebles WHERE $condicion_filtro";
    }else{
        $consulta="SELECT * FROM $tabla_muebles";
    }


    $consulta = "SELECT * FROM $tabla_muebles WHERE price<? AND title like ?";
    $sentencia = $conn->prepare($consulta);
    $sentencia->bind_param("d", $precio_limite, "%$busqueda_nombre%");
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    $muebles = [];
    while ($fila = $resultado->fetch_assoc()) {
        $muebles[] = [
            "id" => $fila["id"],
            "title" => $fila["title"],
            "company" => $fila["company"],
            "image" => $fila["image"],
            "price" => (float)$fila["price"]
        ];
    }
    http_response_code(200);
    echo json_encode([
        "size" => count($datos),
        "data" => $datos,
        "time" => date("d-m-Y"),
        "page" => 1,
        "total_pages" => 1,
        "size_page" => 10
    ]);
    $sentencia->$close();
} else {
    http_response_code(405);
    echo json_encode(["error" => "Método de acceso no permitido"]);
}

$conn->close();
