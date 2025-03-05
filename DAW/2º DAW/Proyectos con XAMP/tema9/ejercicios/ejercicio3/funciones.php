<?php
    function conectar($nombre_host,$nombre_usuario,$password_db,$nombre_db){
		$conexion = new mysqli($nombre_host, $nombre_usuario, $password_db, $nombre_db);
		$conexion->set_charset('utf8');
		return $conexion;
	}
?>