<?php
	require_once "config.php";

    function conectar($host,$usuario,$password,$base_datos){
		$conexion = new mysqli($host, $usuario, $password, $base_datos);
		$conexion->set_charset('utf8');
		return $conexion;
	}


	function obtenerAsignatura($conexion,$id_asignatura){
		global $tabla_asignaturas;

		$consulta="SELECT * FROM $tabla_asignaturas WHERE id_asignatura=?";
		$sentencia=$conexion->prepare($consulta);
		$sentencia->bind_param("i",$id_asignatura);
		$sentencia->execute();
		$resultado=$sentencia->get_result();
		if($resultado->num_rows==1){
			$asignatura=$resultado->fetch_assoc();
			$salida["http"]=200;
			$salida["respuesta"]=["datos"=>$asignatura];
		}else{
			$salida["http"]=404;
			$salida["respuesta"]=["error"=>"No se encuentra la asignatura"];
		}

		$sentencia->close();

		return $salida;
	}

	function obtenerAsignaturasPag($conexion,$pagina,$limite){
		global $tabla_asignaturas;

		$offset=($pagina-1)*$limite;
		$consulta="SELECT * FROM $tabla_asignaturas 
		           LIMIT ? OFFSET ?";

		$sentencia=$conexion->prepare($consulta);
		$sentencia->bind_param("ii",$limite,$offset);
		$sentencia->execute();
		$resultado=$sentencia->get_result();

		if($resultado->num_rows>0){
			$datos=[];
			while($fila=$resultado->fetch_assoc()){
				$datos[]=[
					"id_asignatura"=>$fila["id_asignatura"],
					"nombre_asignatura"=>$fila["nombre_asignatura"],
					"creditos"=>$fila["creditos"]
				];
			}

			$consulta="SELECT count(*) FROM $tabla_asignaturas";
			$resultado=$conexion->query($consulta);
			$fila=$resultado->fetch_row();
			$total=$fila[0];

			$salida["http"]=200;
			$salida["respuesta"]=["datos"=>$datos,
								  "paginacion"=>[
									"actual"=>$pagina,
									"limite"=>$limite,
									"total"=>$total,
									"paginas"=>ceil($total/$limite)
									// "anterior"=>null
									// "siguiente"=>"http://...api.php?page=3&limit=$limit"

								  ]	
								];
			$sentencia->close();
		}else{
			$salida["http"]=404;
			$salida["respuesta"]=["error"=>"No hay resultados"];
		}
		
		return $salida;
	}

	function crearAsignatura($conexion,$nombre_asignatura,$creditos){
		
		if(trim($nombre_asignatura)!="" && is_integer($creditos)){
            $consulta="INSERT INTO asignaturas (nombre_asignatura,creditos) 
			           VALUES (?,?)";
			$sentencia=$conexion->prepare($consulta);
			$sentencia->bind_param("si",$nombre_asignatura,$creditos);
			$sentencia->execute();
			$salida["http"]=200;
			$salida["respuesta"]=["id_insertado"=>$sentencia->insert_id];

			$sentencia->close();
		}else{
			$salida["http"]=400;
			$salida["respuesta"]=["error"=>"Error en los datos"];
		}

		return $salida;
	}

	function modificarAsignatura($conexion,$id_asignatura,
	                                       $nombre_asignatura,
										   $creditos){
		
		if(is_integer($id_asignatura) && 
		   trim($nombre_asignatura)!="" && 
		   is_integer($creditos)){
            
			$consulta="UPDATE asignaturas 
			           SET nombre_asignatura=?,creditos=?
		               WHERE id_asignatura=?";
			$sentencia=$conexion->prepare($consulta);
			$sentencia->bind_param("sii",$nombre_asignatura,$creditos,$id_asignatura);
			$sentencia->execute();
			$salida["http"]=200;
			$salida["respuesta"]=["mensaje"=>"Modificacion realizada"];

			$sentencia->close();
		}else{
			$salida["http"]=400;
			$salida["respuesta"]=["error"=>"Error en los datos"];
		}

		return $salida;
	}

	function borrarAsignatura($conexion,$id_asignatura){

		if(is_numeric($id_asignatura)){
			$consulta="DELETE FROM asignaturas WHERE id_asignatura=?";
			$sentencia=$conexion->prepare($consulta);
			$sentencia->bind_param("i",$id_asignatura);
			$sentencia->execute();
			if($conexion->affected_rows==1){
				$salida["http"]=200;
				$salida["respuesta"]=["mensaje"=>"Borrado realizado"];
			}else{
				$salida["http"]=404;
				$salida["respuesta"]=["error"=>"No existe el  id"];
			}
			$sentencia->close();

		}else{
			$salida["http"]=400;
			$salida["respuesta"]=["error"=>"Error en los datos"];
		}

		return $salida;
	}







?>