<?php
/* Copyright (C) 2001-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2015      Jean-François Ferry	<jfefe@aternatik.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       oyrfreepbx/oyrfreepbxindex.php
 *	\ingroup    oyrfreepbx
 *	\brief      Home page of oyrfreepbx top menu
 */

// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) {
	$res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/main.inc.php";
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = realpath(__FILE__);
$i = strlen($tmp) - 1;
$j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
	$i--;
	$j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1))."/main.inc.php")) {
	$res = @include substr($tmp, 0, ($i + 1))."/main.inc.php";
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php")) {
	$res = @include dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php";
}
// Try main.inc.php using relative path
if (!$res && file_exists("../main.inc.php")) {
	$res = @include "../main.inc.php";
}
if (!$res && file_exists("../../main.inc.php")) {
	$res = @include "../../main.inc.php";
}
if (!$res && file_exists("../../../main.inc.php")) {
	$res = @include "../../../main.inc.php";
}
if (!$res) {
	die("Include of main fails");
}

// Load translation files required by the page
$langs->loadLangs(array("oyrfreepbx@oyrfreepbx"));


//$action = GETPOST('action', 'aZ09');
//Si $startDate no tiene un valor asignado, se le asignará uno por defecto

$startDate=GETPOST('dateStart', 'alpha');

if ($startDate =="") {
    $startDate = date('Y-m-01');
}

//Aquí nos aseguramos de que endDate no tenga una fecha mas anterior que la de $startDate

$endDate = GETPOST('dateEnd', 'alpha');


if ($endDate == '') {
    $endDate = date('Y-m-t', strtotime($startDate));
}

//En esta parte se separa por partes las fechas para que esté separado el día, el mes y el año
$startDateArr = explode('-', $startDate);
$startDate = $startDateArr[0] . '-' . $startDateArr[1] . '-01';

if (isset($startDate) && is_array($startDate) && count($startDate) > 1) {
    $month = $startDate[1];
    $year = $startDate[0];
} else {
    $month = date("m");
    $year = date("Y");
}
$endDateArr = explode('-', $endDate);

$filterCliente = GETPOST('name', 'alpha'); // ejemplo de salida: jaime , carmelo , totti
$arrayfilterCliente = [];

//Aquí se separan todos los clientes y los dnis
if (strlen($filterCliente) > 0) {
    $arrayfilterCliente = explode(",", $filterCliente);
}
$filterDni = GETPOST('dni', 'alpha');
$arrayFilterDni = [];

if (strlen($filterDni) > 0) {
    $arrayFilterDni = explode(",", $filterDni);
}



$page = GETPOST('page', 'int') ? GETPOST('page', 'int') : 1;
$PostNumberPage = GETPOST('number', '09') ? GETPOST('number', '09'): 5;
$Numberpage = intval($PostNumberPage) ? intval($PostNumberPage) : 5 ;

//Declaramos la variable $sql que vamos a utilizar en el siguiente bucle
$sql = "";

if (count($arrayFilterDni) > 0 || count($arrayfilterCliente) > 0) {
    $sql = " && ";

    if (count($arrayFilterDni) > 0 && count($arrayfilterCliente) > 0) {  
        $textarraydni =  '"'. implode('","', $arrayFilterDni) . '"';
        $textarrayclientes = '"'.implode('","', $arrayfilterCliente). '"';
        $sql .= " nom in(" . $textarrayclientes . ") &&  siren in(" . $textarraydni . ")";
    } else {
        if (count($arrayFilterDni) > 0) {
            $textarraydni = '"'.implode('","', $arrayFilterDni). '"';
            $sql .= " siren in(" . $textarraydni . ")";
        } else {
            $textarrayclientes = '"'.implode('","', $arrayfilterCliente). '"';
            $sql .= " nom in(" . $textarrayclientes . ")";
           
        }
    }
}


$js = array("/oyrfreepbx/js/main.js", "/oyrfreepbx/js/slimselect.js");
$css = array("/oyrfreepbx/css/main.css", "/oyrfreepbx/css/slimselect.css");
$title = "oyrfreepbx";

$page_name = "OYR oyrfreepbx Clientes";

llxHeader('', $title, '', '', '', '', $js, $css, 0, 0);

require "db/querys.class.php";

$clientes = new Query($db);
$arrayClientes = $clientes->getUsers($sql);  
$diaactual = date('Y-m-01');

/*
 * View
 */

print load_fiche_titre($langs->trans("OYRFreePBXArea"), '', 'oyrfreepbx.png@oyrfreepbx');

?>
<div class="fichecenter"><div class="fichethirdleft">


<div class="conatinerTable">
<div>
<h4>Clientes</h4>

    <div>
    <!-- Creamos un formulario HTML con la acción de descargar todos los archivos
    La acción del formulario apunta al archivo dowloadAll.php en la carpeta action
    El método de envío del formulario es POST
    El atributo id del formulario es "formDowload" -->
    <form action="<?php echo substr($_SERVER["PHP_SELF"], 0, -16) . 'action/dowloadAll.php'; ?>" method="POST" id="formDowload">
    <!-- Agregamos un campo oculto para enviar el token de seguridad
    El token de seguridad se genera con la función newToken() -->
    <input type="hidden" name="token" value="' . newToken() . '"/>
    <!-- Agregamos dos campos ocultos para enviar las fechas de inicio y fin de la descarga
    Las fechas se almacenan en las variables $startDate y $endDate
    Si no se han proporcionado fechas, se utilizarán valores vacíos -->
    <input type="hidden" id="DowloadDateStart" name="dateStart" value="' . ($startDate ?? '') . '"/>
    <input type="hidden" id="DowloadDateStart" name="dateEnd" value="' . ($endDate ?? ''). '"/>
    <!-- Cerramos el formulario -->
    </form>
    </div>
    </div>


    <!-- Selector de opción para crear factura validada o en borrador -->

    <div class="utility">
    <div class="div_radio">
    <div>
    <input type="radio" id="validate" name="type" value="validate">
    
    <label for="validate">Crear Factura Validada</label>
    </div>
    <div>
    <input type="radio" id="borrador" name="type" value="borrador" checked >
    <label for="borrador">Crear Factura en Borrador</label>
    </div>

    </div>
    <a url="" class="butAction" id="dowloadSelect"   data-dni="" >Descargar</a>
    </div>

    </div>


    <!-- Iniciar el formulario -->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" id="formFilter">
    <!-- Crear un campo oculto para almacenar el token de seguridad -->
    <input type="hidden" name="token" value="<?php echo  newToken() ; ?>"/>
    <!-- Crear campos ocultos para almacenar las fechas de inicio y finalización del filtro -->
    <input type="hidden" id="dateStart" name="dateStart" value="<?php echo $diaactual ?>"/>
    <input type="hidden" id="dateEnd" name="dateEnd" value="' . ($endDate ?? '') . '"/>
    <!-- Crear campos ocultos para almacenar el número de identificación (DNI) y el nombre del filtro -->
    <input type="hidden" id="filterDni" name="dni" value="' . ($filterDni ?? '') . '"/>
    <input type="hidden" id="filterCliente" name="name" value="' . ($filterCliente ?? '') . '"/>
    <!-- Crear campos ocultos para almacenar la página actual y el número de páginas por página -->
    <input type="hidden" id="page" name="page" value="' . ($page ?? 1) . '"/>
    <input type="hidden" id="NumberPage" name="number" value="<?php echo 5 ?>"/>
    <!-- Crear un campo oculto para indicar si se debe actualizar el filtro -->
    <input type="hidden" id="updateFilter" name="update" value="0"/>	
    <!-- Cerrar el formulario -->
    </form>
 

    </div>


    <!-- Creación de tabla con los distintos nombres que forman parte de la tabla -->

	<table class="noborder centpercent mainTable" id="tableResponsive">
	<tbody id="table_main">
	<tr class="liste_titre_filter">
	<th colspan="1" class="wrapcolumntitle center liste_titre" >Cliente</th>
    <th colspan="1" class="wrapcolumntitle center liste_titre" > DNI </th>
    <th colspan="1" class="wrapcolumntitle center liste_titre" > Fecha Inicio </th>
    <th colspan="1" class="wrapcolumntitle center liste_titre" >Fecha Final</th>
    <th colspan="1" class="wrapcolumntitle center liste_titre" ></th>
    <th colspan="1" class="wrapcolumntitle center liste_titre" >Paginación</th>

		</tr>

    <tr class='liste_titre_filter'>


      <?php
// Antes de aplicar cualquier filtro, obtenemos la lista completa de nombres y DNIs
$arrayClientesCompleto = $clientes->getUsers('');

// Construimos las opciones para el selector de nombres
$TextNom = "";
$nomList = [];
foreach ($arrayClientesCompleto as $cliente) {
    $nombre = trim($cliente['nom']);
    if (!in_array($nombre, $nomList)) {
        if (in_array($nombre, $arrayfilterCliente)) {
            $TextNom .= '<option value="' . $nombre . '" selected>' . $nombre . "</option>";
        } else {
            $TextNom .= '<option value="' . $nombre . '">' . $nombre . "</option>";
        }
        $nomList[] = $nombre;
    }
}

// Construimos las opciones para el selector de DNIs
$TextDni = "";
$dniList = [];
foreach ($arrayClientesCompleto as $cliente) {
    $dni = trim($cliente['siren']);
    if (!in_array($dni, $dniList)) {
        if (in_array($dni, $arrayFilterDni)) {
            $TextDni .= '<option value="' . $dni . '" selected>' . $dni . "</option>";
        } else {
            $TextDni .= '<option value="' . $dni . '">' . $dni . "</option>";
        }
        $dniList[] = $dni;
    }
}

?>
<!-- Selector de cliente -->
<th colspan="1" class="wrapcolumntitle center liste_titre" >
<select id="selectCliente" name="Cliente" multiple onkeyup="filtrocliente()" >
<?php echo $TextNom; ?>
    </select>
</th>
<!-- Selector de DNI -->
    <th colspan="1" class="wrapcolumntitle center liste_titre" >
    <select id="selectDNI" name="Cliente" multiple>
<?php  
        echo $TextDni;
?>
    </select>
    </th>

<?php
// Verificar si $startDate está definida y no está vacía
if (isset($startDate) && !empty($startDate)) {
    // Si $startDate tiene un valor, usar ese valor
    $defaultValue = $startDate;
} else {
    // Si $startDate no tiene un valor, establecer una fecha por defecto
    $defaultValue = date('Y-m-d', strtotime('first day of this month'));
}
?>

<!-- fecha de inicio -->
<th colspan="1" class="wrapcolumntitle center liste_titre">
    <input type="date" id="inputDateStart" name="startDate" value="<?php echo $defaultValue; ?>"/>
</th>


    <!-- fecha final -->
    <th colspan="1" class="wrapcolumntitle center liste_titre" >
    <input type="date" id="inputDateEnd" name="EndDate" value="' . $endDate . '"/>
    </th>

    <!-- botón filtar -->
    <th colspan="1" class="wrapcolumntitle center liste_titre" >
    <button type="button" class="liste_titre button_search reposition" id="btnFilter" name="button_search_x" value="x"><span id="btnfilter2" class="fa fa-search">
    </span></button>
    </th>

	<!-- Paginacion -->
    
    <th colspan="1" class="wrapcolumntitle center liste_titre" >
        <form action="';
    <?php
    print $_SERVER["PHP_SELF"];
    print '" method="post" id="form_page">
            <select name="number" id="select_page">';

            
    //  En esta parte se selecciona el tamaño de la paginación que quieres tener 
$possibleValues = [1,2, 5, 15, 25, 35, 50, 100, 1000];

foreach ($possibleValues as $value) {
    $selected = ($PostNumberPage == $value) ? ' selected' : '';
    print "<option value='$value'$selected>$value</option>\n";
}

    ?>
    </select>
            <input type="hidden"  name="token" value="';
    print newtoken() . '" />
        </form>
    </th>

    <tr>

    </select>
            <input type="hidden"  name="token" value="
            <?php print newtoken()  ?>" />
        </form>
    </th>

    <tr>
    <!-- Tabla que muestra el nombre del cotenido que va a mostrar debajo de la misma -->
    </tr>
<tr class="liste_titre trTime">
    <td  class="normal colorth" >Cliente</td>
    <td  class="colorth">DNI</td>
    <td  class="colorth">Fecha de Inicio</td>
    <td  class="colorth">Generar Factura</td>
    <td  class="colorth">Factura Dolibar</td>
    <td  class="colorth"></td>

    <!-- Tabla que muestra toda la información -->
        <tbody>
<?php
            
// Convertir $page a entero utilizando intval()
$page = intval($page);

// Calcula el índice de inicio para mostrar los datos en función de la página actual y el número de elementos por página
$startIndex = ($page - 1) * $Numberpage;
// Calcula el índice máximo de finalización para evitar acceder a elementos que no existen en el array
$maxIndex = min($startIndex + $Numberpage, count($arrayClientes));

// Itera sobre los elementos del array dentro del rango especificado por $startIndex y $maxIndex
// Con un bucle for vamos a extraer la información que nos interesa de los arrays
for ($i = $startIndex; $i < $maxIndex; $i++) {
    print '<tr>';
    print '<td class="normal">' . $arrayClientes[$i]['nom']. ' </td>';
    print '<td class="tdoverflowmax150">' . $arrayClientes[$i]['siren']. '</td>';
    //En la fecha añadimos un valor por defecto por si acaso la variable no tiene una fecha en condiciones
    print '<td class="normal" id="dateCell">' . ($startDate ?? date('Y-m-d', strtotime('first day of this month this year'))) . '</td>';
    print '<td class="botongenerar"><a url="" class="butAction" data-dni="'. $arrayClientes[$i]['siren']. '" data-rowid="'. $arrayClientes[$i]['rowid']. '">Generar</a></td>';
    print '<td class="normal">' . $arrayClientes[$i]['fk_departement']. ' </td>';
    print "<td></td>";
    print'</tr>';
}


            ?>
</tbody>

</table>

</th>

</tbody>

</table>

<!-- Ventana modal -->


<dialog id="modal" class="modal">
    <div>
    <div class="header">
    <h2>Por favor, seleccione 3 archivos:</h2>
    <button id="btncerrar" class="btncerrar">x</button>
    </div>
    <form id="formularioarchivos" action="<?php echo substr($_SERVER['PHP_SELF'],0,-19) ?>actions/GenerateFacture.php" enctype="multipart/form-data" method="POST" >
    <input type="hidden" name="token" value="<?php echo newToken(); ?>">
    <input type="hidden" id="dniInput" name="dni" value="">
    <input type="hidden" id="socidInput" name="socid" value="">
    <input type="hidden" id="yearInput" name="year" value="">
    <input type="hidden" id="monthInput" name="month" value="">

        </div>
        </br>
        <!-- En esta parte creamos las distintas casillas en las que poder añadir los archivos que queramos, tendrán como requisito que terminen por ".xlsx" -->
        <div class="contenedorarchivos">
            <div class="labelInputFile">
                <label>Archivo 900 :</label>
                <input type="file" name="900" class="file900" >
            </div>
            <div class="labelInputFile">
                <label>Archivo 901 :</label>
                <input type="file" name="901" class="file901" >
            </div>
            <div class="labelInputFile">
                <label>Archivo 902 :</label>
                <input type="file" name="902" class="file902" >
            </div>
        </div>
    </form>
            <!-- En esta parte colocaremos los botones para poder hacer algo con los onjetos que hemos subido -->
            <div name="botones" class="botones">
                <button type="submit" id="btnenviar" class="btnenviar">Enviar</button>
                <button id="btnCancelar" class="btnCancelar">Anular</button>
            </div>
            <div class="err" id="err">
            </div>

</dialog>

<?php
//En esta parte mostramos el selector de páginas que se crean por hacer la paginación
print "<div class='paginacion'>";




$Pag = ceil(count($arrayClientes) / $Numberpage);
$urlParams =  "&&number=" . $PostNumberPage;
if ($filterCliente !== "") {
    $urlParams .= "&&name=" . $filterCliente;
}
if ($filterDni !== "") {
    $urlParams .= "&&dni=" . $filterDni;
}
if ($page !== ""){
    $urlParams .= "page". $page;
}
if ($PostNumberPage !== ""){
    $urlParams .= "number". $PostNumberPage;
}
if ($startDate) {
    $urlParams .= "&&dateStart=" . $startDate;
}
// Generar enlaces de paginación
for ($i = 0; $i < $Pag; $i++) {
    $valor = $i + 1;
    // Construir la URL con todos los parámetros de filtrado
    $urlParams = "?page=" . $valor;
    // Aquí añadimos el parámetro de nombre/cliente
    if ($filterCliente !== "") {
        $urlParams .= "&name=" . urlencode($filterCliente);
    }
        // Aquí añadimos el parámetro de dni

    if ($filterDni !== "") {
        $urlParams .= "&dni=" . urlencode($filterDni);
    }
    // Aquí añadimos el parámetro de la fecha inicial
    if ($startDate !== "") {
        $urlParams .= "&dateStart=" . urlencode($startDate);
    }
    // Aquí añadimos el parámetro de la fecha final
    if ($endDate !== "") {
        $urlParams .= "&endDate=" . urlencode($endDate);
    }
    // Aquí añadimos el parámetro de Número de clientes por página
    if ($PostNumberPage !== "") {
        $urlParams .= "&number=" . urlencode($PostNumberPage);
    }
    // Imprimir el enlace de paginación
    print "<a href='" . $_SERVER["PHP_SELF"] . $urlParams . "'>$valor</a>";
}

// Fin de la página
llxFooter();
$db->close();
?>
