<?php
    function conectar($host,$usuario,$password,$base_datos){
		$conexion = new mysqli($host, $usuario, $password, $base_datos);
		$conexion->set_charset('utf8');
		return $conexion;
	}
?>