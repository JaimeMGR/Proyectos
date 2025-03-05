<?php
require_once "conexion.php";


// Método para eliminar o cancelar citas

  $id = $_POST['id'];

      // Eliminar la cita de la base de datos
      $query = "DELETE FROM usuarios WHERE id = $id";
      if ($conexion->query($query)) {
          echo "Usuario eliminado exitosamente.";
      } else {
          echo "Error al eliminar el usuario: " . $conexion->error;
      }
    

// busca el usuario por la id para comprobar que ya no existe
  
    $id = $_POST['id'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
      echo "El usuario ya existe en la base de datos.";
    } else {
      echo "El usuario no existe en la base de datos.";
    }

    header("refresh:5; url=usuarios.php");

?>