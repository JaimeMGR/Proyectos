<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
	session_start();
	session_name= "mi_sesion";
	$id = session_id();
	$nombre = session_name();
	
	if(!isset($idioma)){
		$idioma = "Inglés";
	}

	echo "<table border>";
	echo "<tr><td> Idioma Sesión </td><td> $idioma </td></tr>";
	echo "</table>";
?>
<h1><a href="index.php">Volver</a></h1>
</body>
</html>
