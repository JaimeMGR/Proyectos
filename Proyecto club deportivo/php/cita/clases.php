<?php
include '../esencial/conexion.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['getCitas'])) {
  include 'php\esencial\conexion.php';

  $query = "SELECT c.fecha, c.hora, s.nombre as alumno, v.descripcion as clase 
              FROM cita c
              JOIN socio s ON c.codigo_socio = s.id_socio
              JOIN servicio v ON c.codigo_servicio = v.codigo_servicio";

  $result = $conexion->query($query);

  $citas = [];
  while ($row = $result->fetch_assoc()) {
    $citas[] = $row;
  }

  header('Content-Type: application/json');
  echo json_encode($citas);
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atarfe Fighting</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="../../js/crearcita.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background:#f4f4f9">
  <?php include '../esencial/header.php' ?>
  <main>

    <!-- Haz un formulario para apuntarse a las clases -->
    <h2 style="font-weight: bold;">Apúntate a una clase</h2>
    <form action="crearcita.php" method="post">
      <label for="alumno">Alumno:</label>
      <select name="alumno" id="alumno" class="form-select" required>
        <option value="" hidden>Seleccione un alumno</option>
        <?php
        // Preparar la consulta con una declaración preparada
        $querysocios = "SELECT id_socio, nombre  FROM socio";
        $stmt = $conexion->prepare($querysocios);

        // Ejecutar la consulta
        $stmt->execute();

        // Enlazar las variables para recibir los resultados
        $stmt->bind_result($id_socio, $nombre);

        $contador = 0;

        // Procesar los resultados
        if ($stmt->fetch()) {
          do {
            $contador++;
            echo "<option value='$id_socio'> $nombre </option>";
          } while ($stmt->fetch());
        }
        // Cerrar la declaración y la conexión
        $stmt->close();
        ?>
      </select>
      <label for="clase">Clase:</label>
      <select name="clase" id="clase" class="form-select" required>
        <option value="" hidden>Seleccione una clase</option>
        <?php
        // Preparar la consulta con una declaración preparada
        $queryservicio = "SELECT codigo_servicio, descripcion FROM servicio";
        $stmt = $conexion->prepare($queryservicio);

        // Ejecutar la consulta
        $stmt->execute();

        // Enlazar las variables para recibir los resultados
        $stmt->bind_result($codigo_servicio, $descripcion);

        $contador = 0;

        // Procesar los resultados
        if ($stmt->fetch()) {
          do {
            $contador++;
            echo "<option value='$codigo_servicio'> $descripcion </option>";
          } while ($stmt->fetch());
        }
        // Cerrar la declaración y la conexión
        $stmt->close();
        $conexion->close();
        ?>
      </select>
      <label for="fecha">Fecha:</label>
      <input type="date" class="form-control" name="fecha" id="fecha" required>
      <label for="horario">Horario:</label>
      <select name="hora" class="form-control" id="hora" required>
        <option value="" hidden>Seleccione un horario</option>
        <option name="hora" value="9:30">9:30</option>
        <option name="hora" value="10:30">10:30</option>
        <option name="hora" value="12:00">12:00</option>
        <option name="hora" value="17:00">17:00</option>
        <option name="hora" value="18:00">18:00</option>
        <option name="hora" value="19:00">19:00</option>
        <option name="hora" value="20:00">20:00</option>
      </select>

      <input type="submit" class="btn btn-outline-secondary" value="Apuntarse">
    </form>
    <div id="error-container" style="color: red; font-size: 14px; margin-top: 10px;"></div>
    
    <h2>Calendario</h2>
    <?php include '../esencial/calendario.php'; ?>
    <br>
    <form class="formbuscar" method="post" action="buscarcita.php">
      <label for="busqueda"><h2 style="font-weight: bold;">Buscar clase</h2></label>
      <input class="form-control" type="text" id="busqueda" name="busqueda" placeholder="Buscar por nombre...">
      <button class="btn btn-warning" type="button|submit">Buscar</button>
    </form>
  </main>
  <?php include '../esencial/footer.php' ?>
</body>

</html>