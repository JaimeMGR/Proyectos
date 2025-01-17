<?php
include('conexion.php');

// Configurar la zona horaria a España
date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'es_ES.UTF-8');

// Obtener el mes y año actuales o proporcionados
setlocale(LC_ALL, 'es_ES');
// Obtener mes
$mes = isset($_GET['mes']) ? (int)$_GET['mes'] : date('n');
// Obtener año
$anio = isset($_GET['anio']) ? (int)$_GET['anio'] : date('Y');
// Contertir el numero del mes a nombre
$nombreMes = strftime('%B', strtotime("01-$mes-$anio"));
// Cambiar mes en inglés a español
switch ($mes) {
    case $nombreMes == 'January':
        $nombreMes = "Enero";
        break;
    case $nombreMes == 'February':
        $nombreMes = "Febrero";
        break;
    case $nombreMes == 'March':
        $nombreMes = "Marzo";
        break;
    case $nombreMes == 'April':
        $nombreMes = "Abril";
        break;
    case $nombreMes == 'May':
        $nombreMes = "Mayo";
        break;
    case $nombreMes == 'June':
        $nombreMes = "Junio";
        break;
    case $nombreMes == 'July':
        $nombreMes = "Julio";
        break;
    case $nombreMes == 'August':
        $nombreMes = "Agosto";
        break;
    case $nombreMes == 'September':
        $nombreMes = "Septiembre";
        break;
    case $nombreMes == 'October':
        $nombreMes = "Octubre";
        break;
    case $nombreMes == 'November':
        $nombreMes = "Noviembre";
        break;
    case $nombreMes == 'December':
        $nombreMes = "Diciembre";
        break;
}

// Ajustar mes y año si se navega más allá de los límites
if ($mes < 1) {
    $mes = 12;
    $anio--;
} elseif ($mes > 12) {
    $mes = 1;
    $anio++;
}

// Transformar el numero del mes a nombre del mes en español




// Consultar las citas con información adicional (con JOIN para obtener datos completos)
$query = "
    SELECT 
        c.id_cita,
        c.fecha, 
        c.hora, 
        c.estado,
        s.nombre AS socio, 
        s.telefono, 
        srv.descripcion AS servicio_desc, 
        srv.duracion AS servicio_duracion, 
        srv.imagen AS servicio_imagen
    FROM 
        cita c
    INNER JOIN socio s ON c.codigo_socio = s.id_socio
    INNER JOIN servicio srv ON c.codigo_servicio = srv.codigo_servicio
";
$resultado = $conexion->query($query);

// Manejo de errores de la consulta
if (!$resultado) {
    die("Error en la consulta SQL: " . $conexion->error);
}

// Organizar citas por fecha
$citasPorFecha = [];
while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    $fecha = $fila['fecha'];
    if (!isset($citasPorFecha[$fecha])) {
        $citasPorFecha[$fecha] = [];
    }
    $citasPorFecha[$fecha][] = [
        'id_cita' => $fila['id_cita'],
        'hora' => substr($fila['hora'], 0, 5), // Hora formateada (hh:mm)
        'socio' => $fila['socio'],
        'telefono' => $fila['telefono'],
        'servicio_desc' => $fila['servicio_desc'],
        'estado' => $fila['estado'],
    ];
}

// Función para generar el calendario
function generarCalendario($anio, $mes, $citasPorFecha)
{
    $diasSemana = ['LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO', 'DOMINGO'];
    $primerDiaMes = mktime(0, 0, 0, $mes, 1, $anio);
    $diasEnMes = date('t', $primerDiaMes);
    $diaInicialSemana = (date('N', $primerDiaMes) - 1) % 7;

    echo '<table class="calendario" border="1" style="width: 100%; text-align: center;">';
    echo '<tr>';
    foreach ($diasSemana as $dia) {
        echo "<th class='dia' style='background:#dc3545;' scope='col'>$dia</th>";
    }
    echo "</tr>";
    echo '</tr><tr>';

    // Espacios antes del primer día
    for ($i = 0; $i < $diaInicialSemana; $i++) {
        echo '<td></td>';
    }

    // Generar los días
    for ($dia = 1; $dia <= $diasEnMes; $dia++) {
        $fechaActual = sprintf('%04d-%02d-%02d', $anio, $mes, $dia);
        echo '<td style="vertical-align: top;">';
        echo "<div><strong>$dia</strong></div>";

        // Verificar si hay citas para este día
        if (isset($citasPorFecha[$fechaActual])) {
            echo "<button onclick='mostrarPopup(\"$fechaActual\")' style='background: #e8f4ff; border: none; padding: 5px; cursor: pointer;'>Ver Citas</button>";
            
            echo "<div id='popup-$fechaActual' class='popup' style='display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; border: 2px solid #ccc; padding: 20px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); z-index: 10; max-width: 300px;'>";
            $contador = 0;
            foreach ($citasPorFecha[$fechaActual] as $cita) {
                if ($cita['estado'] == 0) {
                    $estado = "Cancelada";
                } else {
                    $estado = "Pendiente";
                }
                $fechaHoy = date("Y-m-d");
                if ($fechaActual < $fechaHoy) {
                    $cita['estado'] == 0;
                    $estado = "Finalizado";
                }
                $contador++;
                echo "<h4>Detalles de la cita $contador</h4>";
                echo "<div class='detalle'><strong>Hora:</strong> {$cita['hora']}</div>";
                echo "<div class='detalle'><strong>Socio:</strong> {$cita['socio']}</div>";
                echo "<div class='detalle'><strong>Teléfono:</strong> {$cita['telefono']}</div>";
                echo "<div class='detalle'><strong>Servicio:</strong> {$cita['servicio_desc']}</div>";
                echo "<div class='detalle'><strong>Estado: </strong> {$estado}</div>";
                echo "<br>";
                

                // Verificar si la cita es futura, de lo contrario no mostrar el botón de eliminar

                if ($fechaActual > $fechaHoy && $estado == "Pendiente") {
?>
                    <!-- Botón para cancelar cita -->
                    <form method="POST" action="../cita/acciones.php" style="display: inline;">
                        <input type="hidden" name="accion" value="cancelar">
                        <input type="hidden" name="id_cita" value="<?php echo $cita['id_cita']; ?>">
                        <button type="submit" class="btn btn-danger">Cancelar cita</button>
                    </form>
                    <br><br>
                <?php
                } else {
                    $estado = "Finalizada";
                }
                if ($fechaActual > $fechaHoy && $cita['estado'] == 0) {
                ?>
                    <!-- Botón para eliminar cita -->
                    <form method="POST" action="../cita/acciones.php" style="display: inline;">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id_cita" value="<?php echo $cita['id_cita']; ?>">
                        <button type="submit" class="btn btn-danger">Eliminar cita</button>
                    </form>
                    <br><br>
<?php
                }
            }
            echo "<button onclick='cerrarPopup(\"$fechaActual\")'class='btn btn-danger'>Cerrar</button>";
            echo "</div>";
        }
        echo '</td>';

        // Salto de fila al final de la semana
        if (($diaInicialSemana + $dia) % 7 == 0) {
            echo '</tr><tr>';
        }
    }

    // Espacios después del último día
    $diasRestantes = (7 - (($diaInicialSemana + $diasEnMes) % 7)) % 7;
    for ($i = 0; $i < $diasRestantes; $i++) {
        echo '<td></td>';
    }

    echo '</tr></table>';
}



// Calcular mes y año anteriores y siguientes
$mesAnterior = $mes - 1;
$anioAnterior = $anio;
if ($mesAnterior < 1) {
    $mesAnterior = 12;
    $anioAnterior--;
}

$mesSiguiente = $mes + 1;
$anioSiguiente = $anio;
if ($mesSiguiente > 12) {
    $mesSiguiente = 1;
    $anioSiguiente++;
}

// Mostrar el mes y año
echo "<div style='text-align: center; margin: 20px 0;'>";
echo "<h2>" . $nombreMes . " de " . $anio . "</h2>";

// Botones de navegación
echo "<a href='?mes=$mesAnterior&anio=$anioAnterior' style='margin-right: 20px; text-decoration: none;'><button class='btn btn-danger'>Anterior</button></a>";
echo "<a href='?mes=$mesSiguiente&anio=$anioSiguiente' style='text-decoration: none;'><button class='btn btn-danger'>Siguiente</button></a>";
echo "</div>";

// Generar el calendario
generarCalendario($anio, $mes, $citasPorFecha);

?>

<script>
    // Mostrar el popup con las citas de un día específico
    function mostrarPopup(fecha) {
        document.getElementById('popup-' + fecha).style.display = 'block';
    }

    // Cerrar el popup
    function cerrarPopup(fecha) {
        document.getElementById('popup-' + fecha).style.display = 'none';
    }
</script>








<style>
    /* Estilo para el popup */
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        border: 2px solid #ccc;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }
</style>