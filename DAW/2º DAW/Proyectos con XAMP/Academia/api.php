<?php
// Encabezados para permitir CORS
header("Access-Control-Allow-Origin: *"); // Permite todas las solicitudes de origen
// Establecer tipo de contenido en JSON
header("Content-Type: application/json");


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

// Determinar el método HTTP
$metodo = $_SERVER['REQUEST_METHOD'];

if( $metodo=="POST" || $metodo=="PUT"){
    $entrada=json_decode(file_get_contents("php://input"),true);
}

switch ($metodo) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Obtener una asignatura por ID
            $resultado=obtenerAsignatura($conn,$_GET["id"]);
            http_response_code($resultado["http"]);
            echo json_encode($resultado["respuesta"]);
        } else {
            // Parámetros de paginación con valores predeterminados
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 10;

            if ($page < 1 || $limit < 1) {
                http_response_code(400); // Bad Request
                echo json_encode([
                    "error" => "Parámetros de paginación inválidos"
                ]);
                die();
            }

            $resultado=obtenerAsignaturasPag($conn,$page,$limit);
            http_response_code($resultado["http"]);
            echo json_encode($resultado["respuesta"]);


        }
        break;
    

    case 'POST':
        if(isset($entrada["nombre_asignatura"]) && isset($entrada["creditos"])){
            $resultado=crearAsignatura($conn,
                                   $entrada["nombre_asignatura"],
                                   $entrada["creditos"]);
            http_response_code($resultado["http"]);
            echo json_encode($resultado["respuesta"]);
        }else{ 
            http_response_code(400);
            echo json_encode(["error"=>"Faltan datos"]);
        }
        
        break;

    case 'PUT':
        if(isset($entrada["id_asignatura"]) &&
           isset($entrada["nombre_asignatura"]) && 
           isset($entrada["creditos"])){
            $resultado=modificarAsignatura($conn,
                                   $entrada["id_asignatura"],
                                   $entrada["nombre_asignatura"],
                                   $entrada["creditos"]);
            http_response_code($resultado["http"]);
            echo json_encode($resultado["respuesta"]);
        }else{ 
            http_response_code(400);
            echo json_encode(["error"=>"Faltan datos"]);
        }
        break;

    case 'DELETE':
        if(isset($_GET["id"])){
            $resultado=borrarAsignatura($conn,$_GET["id"]);
            http_response_code($resultado["http"]);
            echo json_encode($resultado["respuesta"]);
        }else{ 
            http_response_code(400);
            echo json_encode(["error"=>"Faltan datos"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error"=>"Método no soportado"]);
        
}

// Cerrar la conexión
$conn->close();
