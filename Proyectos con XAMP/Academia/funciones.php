<?php
require_once "config.php";
function conectar($host, $usuario, $password, $base_datos)
{
	$conexion = new mysqli($host, $usuario, $password, $base_datos);
	$conexion->set_charset('utf8');
	return $conexion;
}



function obtenerAsignaturas($conexion, $id_asignatura)
{
	global $tabla_asignaturas;
	$consulta = "SELECT * FROM $tabla_asignaturas WHERE id_asignatura=?";
	$sentencia = $conexion->query($consulta);
	$sentencia->bind_param("i", 'id_asignatura');
	$sentencia->execute();
	$resultado = $sentencia->get_result();
	if ($resultado->num_rows == 1) {
		$asignatura = $resultado->fetch_assoc();
		$salida["http"] = 200;
		$salida["respuesta"] = ["datos" => $asignatura];
	} else {
		$salida["http"] = 404;
		$salida["respuesta"] = ["error" => "No se encuentra la asignatura."];
	}
}


function obtenerAsignaturaPag($conexion, $pagina, $limite)
{
	global $tabla_asignaturas;

	$offset = ($pagina - 1) * $limite;
	$consulta = "SELECT * FROM $tabla_asignaturas
				   LIMIT ? OFFSET ?";

	$sentencia = $conexion->prepare($consulta);
	$sentencia->bind_param("ii", $limite, $offset);
	$sentencia->execute();
	$resultado = $sentencia->get_result();

	if($resultado->num_rows>0){
		$datos=[];
		while($fila = $resultado->fetch_assoc()){
            $datos[] = [
				"id_asignatura"=>$fila["id_asignatura"],
				"nombre_asignatura"=>$fila["nombre_asignatura"],
                "creditos"=>$fila["creditos"]
			];
        } 

		$consulta="SELECT count(*) FROM $tabla_asignaturas";
		$resultado = $conexion->query($consulta);
		$fila=$resultado->fetch_row();
		$total = $fila[0];

		$salida["http"]=200;
		$salida["respuesta"]=["datos"=>$datos,
		"paginacion"=>[
			"datos"=>$datos,
			"paginacion"=>[
				"actual"=>$pagina,
				"limite"=>$limite,
				"total"=>$total,
				"paginas"=>ceil($total/$limite),
				"anterior"=>null,
				"siguiente"=>"http://...api.php?page=3&limit=$limite"

				]
			]
		];
	}else{
		$salida["http"] = 404;
        $salida["respuesta"] = ["error" => "No hay resultados."];
	}
}
