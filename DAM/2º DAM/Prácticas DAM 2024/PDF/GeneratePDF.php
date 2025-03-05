<!-- El código proporcionado es una clase PHP llamada GeneratePDF que genera una factura en PDF.
 A continuación, se explican las funciones y propiedades dentro de la clase:

Propiedades: Son variables utilizadas dentro de la clase.
 Almacenan diversa información sobre la factura, como el nombre, la dirección y los detalles de la factura.
  Algunas propiedades notables incluyen:

$nombre: Nombre del cliente.
$direccion: Dirección del cliente.
$cp: Código postal del cliente.
$poblacion: Ciudad del cliente.
$provincia: Provincia del cliente.
$codClien: Código del cliente.
$CIF: Número de identificación fiscal del cliente.
$numFactura: Número de factura.
$datefact: Fecha de la factura.
$priceExtra: Costos adicionales de la factura.
$baseImponible: Importe imponible.
$importIva: Importe del IVA (impuesto sobre el valor añadido).
$total: Importe total de la factura.
$month: Mes de la fecha de la factura.
$year: Año de la fecha de la factura.

__construct(): El constructor inicializa el objeto con los datos proporcionados, incluyendo la información del cliente, los detalles de la factura y
 los costos adicionales. También calcula el importe total de la factura y el IVA.

generatePDF(): Esta función genera la factura en PDF utilizando la librería Dompdf.
 Crea una plantilla HTML con la información de la factura y luego la convierte en un archivo PDF.
  La función también firma el PDF utilizando un certificado y una clave privada.

createHTML(): Esta función crea la plantilla HTML para la factura.
 Incluye el encabezado, el pie de página y el contenido principal de la factura, como la información del cliente, los detalles de la factura y
  los costos adicionales.

createImage(): Esta función devuelve los datos de imagen codificados en base64 para la imagen del logotipo de la factura.

getLineas() (no mostrado en el código proporcionado): Esta función genera la lista detallada de llamadas, mensajes y uso de datos para la factura.

getDataLine(): Esta función procesa los datos para una sola línea de la factura, como una llamada o mensaje, y 
devuelve un objeto que contiene la información relevante.

GetDataBonos(): Esta función genera el HTML para la sección de uso de datos adicionales de la factura.

GetTotalBonos(): Esta función calcula el uso total de datos adicionales y actualiza la propiedad $priceBonos.

GetTarifas(): Esta función calcula los costos totales de las tarifas y actualiza la propiedad $priceTarifas.

GetDescuentos(): Esta función calcula los descuentos totales y actualiza la propiedad $totalDescuentos.

La clase GeneratePDF está diseñada para crear una factura detallada utilizando los datos proporcionados y varias librerías, incluyendo Dompdf y Fpdi. -->

<?php

/* use TCPDF;
use setasign\Fpdi\Tcpdf\Fpdi; */

//error_reporting(E_ERROR | E_PARSE);
require '../vendor/autoload.php';

use Dompdf\Dompdf;

require_once TCPDF_PATH . 'tcpdf.php';

// We need to instantiate tcpdi object (instead of tcpdf) to use merging features. But we can disable it (this will break all merge features).
if (empty($conf->global->MAIN_DISABLE_TCPDI)) {
    require_once TCPDI_PATH . 'tcpdi.php';
}
require_once(DOL_DOCUMENT_ROOT . '/custom/onmovil/vendor/setasign/fpdi/src/autoload.php');

use setasign\Fpdi\Tcpdf\Fpdi;

class GeneratePDF
{
    private $nombre;
    private $direccion;
    private $cp;
    private $poblacion;
    private $provincia;
    private $codClien;
    private $CIF;
    private $numFactura;
    private $datefactInit;
    private $datefactEnd;
    private $datefact;
    private $priceExtra;
    private $baseImponible = 0;
    private $priceTarifas = 0;
    private $priceBonos = 0;
    private $FormaPago = "Domiciliación";
    private $direccionNues = "C/ Margarita 5, Local 2";
    private $localidadNues = "La Zubia";
    private $provinciaNues = "Granada";
    private $CIFNues = "B19566835";
    private $NombreNues = "OYR SOLUTIONS S.L.";
    private $cpNues = "18140";
    private $telefoNues = "958 082 082";
    private $contentTarifas = "";
    private $numbers = array();
    private $bonosExtra;
    private $dataBonosExtra;
    private $contentDescuentos;
    private $descuentos;
    private $totalDescuentos = 0;
    private $iva = 1.21;
    private $iva2 = 0.21;
    private $importIva = 0;
    private $priceExtraInternational;
    private $total;
    private $month;
    private $year;

    function __construct($data, $priceExtra, $descuentos, $addressClient, $month, $year, $ref)
    {

        $this->numFactura = $ref;
        $this->nombre = $data->nombre . " " . $data->apellidos;
        $this->CIF = $data->identificacion;
        $this->codClien = $data->cod_per_emp;
        $this->cp = $addressClient->zip;
        $this->poblacion = $addressClient->town;
        $this->direccion = $addressClient->address;
        $this->provincia = $addressClient->departement;
        $this->datefactInit = "01-" . $month . "-" . $year;
        $this->datefactEnd = cal_days_in_month(CAL_GREGORIAN, $month, $year) . "-" . $month . "-" . $year;
        $this->datefact = cal_days_in_month(CAL_GREGORIAN, $month, $year) . "-" . $month . "-" . $year;
        $this->priceExtra = (array) $priceExtra;
        $this->month = $month;
        $this->year = $year;



        $this->numbers = $data->numbers;
        $this->dataBonosExtra = $data->bonosExtra;
        $this->descuentos = $descuentos;



        $this->priceExtraInternational = $priceExtra[0]->international;






        $this->GetTarifas($data);
        $this->GetDescuentos();
        $this->GetTotalBonos($this->dataBonosExtra);




        $this->baseImponible =  $this->priceExtra[0]->call + $this->priceExtra[0]->msm + $this->priceExtra[0]->data + $this->priceExtraInternational->call + $this->priceExtraInternational->data + $this->priceExtraInternational->msm + $this->priceTarifas + $this->priceBonos - $this->totalDescuentos;

        // $this->importIva=  $this->importIva + $this->priceExtra[0]->call * $this->iva2 + $this->priceExtra[0]->msm * $this->iva2 + $this->priceExtra[0]->data * $this->iva2 +$this->priceExtraInternational->call * $this->iva2 + $this->priceExtraInternational->data *$this->iva2+$this->priceExtraInternational->msm*$this->iva2;
        $this->importIva = $this->baseImponible * $this->iva2;
        $this->total =   $this->importIva + $this->baseImponible;
        // $this->total= $this->total+ $this->priceExtra[0]->call*$this->iva +  $this->priceExtra[0]->msm * $this->iva + $this->priceExtra[0]->data* $this->iva+ $this->priceExtraInternational->call * $this->iva+$this->priceExtraInternational->data*$this->iva+$this->priceExtraInternational->msm*$this->iva;

    }


    public function generatePDF()
    {
        $html = $this->createHTML();

        $path = DOL_DATA_ROOT . "/onMovil";

        $pathDolibarr = DOL_DATA_ROOT . "/facture" . "/" . $this->numFactura;


        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');


        if (!is_dir($pathDolibarr)) {
            mkdir($pathDolibarr, 0750, true);
        }

        $path .= "/" . $this->year . "-" . $this->month;
        if (!is_dir($path)) {
            mkdir($path, 0750, true);
        }

        $dompdf->render();
        $contenido = $dompdf->output();
        $nombrefile = str_replace(" ", "-", trim($this->nombre));

        if (substr($nombrefile, -1) == ".") {
            $nombrefile = rtrim($nombrefile, ".");
        };
        $nombreDelDocumento = $this->numFactura . "-Rapinet-" . $nombrefile . ".pdf";


        if (preg_match("/^\(PROV(.*)/", $this->numFactura)) {
            $ficheros = scandir($path);

            for ($i = 0; $i < count($ficheros); $i++) {
                if (preg_match("/(.*)$nombrefile.pdf/", $ficheros[$i])) {
                    unlink($path . "/" . $ficheros[$i]);
                }
            }
        }




        file_put_contents($path . "/" . $nombreDelDocumento, $contenido);
        $return = file_put_contents($pathDolibarr . "/" . $nombreDelDocumento, $contenido);

        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($path . "/" . $nombreDelDocumento);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);
            $pdf->SetPrintHeader(false);
            $pdf->AddPage();
            $pdf->useTemplate($templateId, ['adjustPageSize' => true]);
        }


        $info = array(
            'Name' => 'OYR Solutions S.L.'
        );
        $certificate = 'file://' . realpath(DOL_DOCUMENT_ROOT . '/custom/onmovil/cert/cert.crt');
        $primaryKey =  'file://' . realpath(DOL_DOCUMENT_ROOT . '/custom/onmovil/cert/key.pem');
        @$pdf->setSignature($certificate, $primaryKey, "IntroducirPassword", '', 2, $info);

        @$pdf->Output($path . "/" . $nombreDelDocumento, 'F');
	copy($path . "/" . $nombreDelDocumento, $pathDolibarr . "/" . $nombreDelDocumento);
        return $return;
    }

    private  function createHTML()
    {

        $html = '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content ="width=ç, initial-scale=1.0">
                <title>Document</title>
            <style>
                footer{
                    position:fixed;
                    bottom:-45px;
                    width:100%;
                    height:40px;
                    display:block;
                    text-align:center;
                    color:rgb(167, 205, 236);
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-weight:700;
                    font-size:15px;
                }

                table{
                    text-align:center;
                    border-spacing: 10px 5px;
                    border:solid 1px black;
                    width:150px;
                    height:150px;
                    margin-left: auto;
                    margin-right: auto;
                }
                table th{
                    text-align:center;
                }
                table td{
                    text-align:center;
                }
                
                .verticalText{
                    writing-mode: vertical-lr;
                    transform: rotate(180deg);
                }

                header{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    position: relative;
                    top: 35px;
                }

                header p{
                    font-size:13px;
                }

                .divImagen{
                    display:block;
                    line-height:0.25;
                    text-align:right;
                }
                .divImagen .p{
                   
                    width: 34%;
                    margin-left:auto;
                    
                }
                .divImagen .p p{
                    text-align:left
                }

                img {
                    width:250px;
                    display:block;
                    margin:auto;
                }
        
                .tablePhone {
                    border-collapse: collapse;
                    width: 100%;

                }

                h1{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    color:rgb(167, 205, 236);
                    padding-left:30px;
                }

                h2{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    background-color: rgb(167, 205, 236);
                    color:white;
                    padding-left:20px;
                    font-size:15px;
                    padding:3px;
                }

       

                .datos{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    width: 100%;
                    border:none;

                }
                .color{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    color:rgb(167, 205, 236);
                    font-weight:700;
                    width: 150px;
                   
                }
                .Datosdirection{
                    margin:2px;
                    padding:0px;
                }
                .datosFactura p{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-weight:700;
                    font-size:13px;
                }

                .cliente{
                    vertical-align: text-top;
                }

                .cliente p{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-weight:lighter;
                    font-size:13px;
                    width:700px;
                }

                .serviciosFacturados{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-size:13px;
                    width:100%;
                    border: 0px;
                }

                .serviciosFacturados td, th{
                    line-height:0.75;
                    text-align:left;
                }

        
                
                hr{
                    background-color: rgb(167, 205, 236);
                    border:0px;
                    height:3px;
                    margin:0px;
                }
                .TablaDatos, .tablaLLamadas, .tablaSMS{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-size:7px;
                    align:center;
                    margin:0px;
                    padding:0px;
                    width: 100%;
                    border:none;
                }
                .separation{
                   /* border-right : 1px solid  rgb(167, 205, 236) !important;*/
                }
        
                h3{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-size:13px;
                    border-bottom: 2px solid rgb(167, 205, 236);
                }
                .area{
                    width: 100%;
                    height: auto;
                }
                .container{
                    max-width: 100%;
                    padding-top: 1rem;
                    margin: 0 auto;
                }
                .box{
                    display: inline-block;
                
                    background: lightgreen;
                }
                .tableSubtotales{
                    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                    font-size:10px;
                    text-align:center;
                 
                    padding:0px;
                    width: 30%;
                    border:none;
                }
                .footer{
                    font: size 14px;
                }
            </style>
            </head>
            
            <body>
                <footer>
                    <p class="footer">' . $this->direccionNues . ' -  ' . $this->cpNues . ', ' . $this->localidadNues . ', Teléfono: ' . $this->telefoNues . ' email:administracion@oyr.es</p>
                </footer>
                <header class="divImagen">
                    <img src=' . $this->createImage() . '>
                    <div class="p">
                    <p>' . $this->NombreNues . '</p>
                    <p>CIF: ' . $this->CIFNues . '</p>
                    <p>' . $this->direccionNues . '</p>
                    <p>' . $this->localidadNues . ', ' . $this->cpNues . ' ' . $this->provinciaNues . '</p>
                    </div>
                </header>

                <div class="tituloFactura">
                    <h1>Factura</h1>
                </div>
                
                <div>
                    <h2>Datos</h2>
                    <table class="datos">
                        <tbody>
                            <tr>
                                <td class="color">
                                    Código Cliente:
                                </td>
                                <td class="datosFactura">
                                ' . $this->codClien . '
                                </td>
                                <td rowspan="6">
                                     ' . $this->nombre . '<br/>
                                     ' . $this->direccion . '</br>
                                    ' . $this->poblacion . '<br>
                                    ' . $this->cp . ', ' . $this->provincia . '
                                </td>
                            </tr>
                            <tr>
                                <td class="color">
                                    NIF:
                                </td>
                                <td class="datosFactura">
                                    ' . $this->CIF . '
                                </td> 
                            </tr>
                            <tr>
                                <td class="color">
                                    Número de factura:
                                </td>
                                <td class="datosFactura">
                                    ' . $this->numFactura . '
                                </td>
                            </tr>
                            <tr>
                                <td class="color">
                                    Fecha de factura:
                                </td>
                                <td class="datosFactura">
                                    ' . $this->datefact . '
                                </td> 
                            </tr>
                            <tr>
                                <td class="color">
                                    Periodo facturado:
                                </td>
                                <td class="datosFactura">
                                    ' .  $this->datefactInit . " al " . $this->datefactEnd . '
                                </td> 
                            </tr>
                            <tr>                              
                                <td class="color">
                                    N. de Cuenta:
                                </td>
                                <td class="datosFactura">
                                    ' . $this->FormaPago . '
                                </td>
                            </tr>
    
                        </tbody>
                    </table>
                </div>

                <div>
                    <h2>SERVICIOS FACTURADOS</h2>
                    <table class="serviciosFacturados">
                        <tbody>
                            <tr>
                                <th>Conceptos Telefonía Móvil</th>
                                <th colspan="2"></th>
                                <th  class="serviciosFacturadosDerecha">Importe</th>
                                <th  class="serviciosFacturadosDerecha">A cobrar</th>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <hr>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="3">Llamadas</td>
                               
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtra[0]->call), 2, ',', '.') . '</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtra[0]->call), 2, ',', '.') . '</td>
                            </tr>
                            <tr>
                                <td colspan="3">Llamadas internacionales</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtraInternational->call), 2, ',', '.') . '</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtraInternational->call), 2, ',', '.') . '</td>
                            </tr>

                            <tr>
                                <td colspan="3">SMS</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtra[0]->msm), 2, ',', '.') . '</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtra[0]->msm), 2, ',', '.') . '</td>
                            </tr>
                            <tr>
                                <td colspan="3">SMS internacionales</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtraInternational->msm), 2, ',', '.') . '</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtraInternational->msm), 2, ',', '.') . '</td>
                            </tr>

                            <tr>
                                <td colspan="3">Datos</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtra[0]->data), 2, ',', '.') . '</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtra[0]->data), 2, ',', '.') . '</td>
                            </tr>
                            <tr>
                                <td colspan="3">Datos internacionales</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtraInternational->data), 2, ',', '.') . '</td>
                                <td class="serviciosFacturadosDerecha">' . number_format(floatval($this->priceExtraInternational->data), 2, ',', '.') . '</td>
                            </tr>

                            ' .
            /* 
                            
                            <tr>
                                <td colspan="3">Roaming</td>
                                <td class="serviciosFacturadosDerecha">NO DATA</td>
                                <td class="serviciosFacturadosDerecha">NO DATA</td>
                            </tr>
                            */
            /*  <tr>
                                <td colspan="3">F</td>
                                <td class="serviciosFacturadosDerecha">'.number_format($this->priceExtra[0]->F, 2).'</td>
                                <td class="serviciosFacturadosDerecha">'.number_format($this->priceExtra[0]->F, 2).'</td>
                            </tr>
                            <tr>
                                <td colspan="3">E</td>
                                <td class="serviciosFacturadosDerecha">'.number_format($this->priceExtra[0]->E, 2).'</td>
                                <td class="serviciosFacturadosDerecha">'.number_format($this->priceExtra[0]->E, 2).'</td>
                            </tr>
                            <tr>
                                <td colspan="3">I</td>
                                <td class="serviciosFacturadosDerecha">'.number_format($this->priceExtra[0]->I, 2).'</td>
                                <td class="serviciosFacturadosDerecha">'.number_format($this->priceExtra[0]->I, 2).'</td>
                            </tr> */

            '<tr>
                                <td colspan="5"></td>
                            </tr>

                            <tr>
                                <td colspan="5"></td>
                            </tr>

                            <tr>
                                <td colspan="5">Tarifas:</td>
                            </tr>

                            <tr>
                                ' . $this->contentTarifas . '
                            </tr>';
        if (count($this->dataBonosExtra) > 0) {
            $html .=   '
                                <br>
                                <tr>
                                <td colspan="5">Bonos:</td>
                            </tr>
  
                            <tr>
                                ' . $this->bonosExtra . '
                            </tr>
                            ';
        }





        if (count($this->descuentos) > 0) {
            $html .=   '
                            <br>
                            <tr>
                            <td colspan="5">Descuentos:</td>
                            </tr>
                            <tr>
                            ' . $this->contentDescuentos . '
                            </tr>';
        }
        $html .=   '
                            <tr>
                                <td colspan="5">
                                    <hr>
                                </td>
                            </tr>

                           
                            <tr>
                                <td colspan="3"></td>
                                <th>Base Imponible</th>
                                <td class="serviciosFacturadosDerecha">' . number_format($this->baseImponible, 2, ',', '.') . '</td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <th>IVA (21%)</th>
                                <td class="serviciosFacturadosDerecha">' . number_format($this->importIva, 2, ',', '.') . '</td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                </td>
                                
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <th>Total a pagar</th>
                                <td class="serviciosFacturadosDerecha">' . number_format($this->total, 2, ',', '.') . '</td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                </td>
                            
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

              
                <br>
                <br>
                <br>
               
                ' .   $this->getLineas() . '
            </body>
        </html>';
        return $html;
    }

    private function createImage()
    {
        $logourl = "../img/logo_RAPINET.png";
        $type = pathinfo($logourl, PATHINFO_EXTENSION);
        $data = file_get_contents($logourl);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    private function getLineas()
    {
        $text = "";

        $text .= '<div>
                    <h2>DETALLE DE LLAMADAS</h2>';



        for ($i = 0; $i < count($this->numbers); $i++) {
            $arrayData = $this->getDataLine($this->numbers[$i]);
            $data = $arrayData[0];

            $subtotalimport = $arrayData[0];


            if ($data->v !== "") {
                $text .=
                    '<h3>LINEA: ' . $this->numbers[$i]->msisdn  . '</h3>
                <h3>LLAMADAS: ' . $this->numbers[$i]->msisdn  . '</h3>
                <div class="area">
                    <table class="tablaLLamadas">
                        <tbody>
                            <tr>
                                <th>FECHA</th>
                                <th>OPERA/PAIS</th>
                                <th>DESTINO</th>
                               
                                <th>PLAN</th>
                                <th>HORA</th>
                                <th>DURACIÓN</th>
                                <th>IMPORTE</th>
                                <th>FECHA</th>
                                <th>OPERA/PAIS</th>
                                <th>DESTINO</th>
                               
                                <th>PLAN</th>
                                <th>HORA</th>
                                <th>DURACIÓN</th>
                                <th>IMPORTE</th>
                            </tr>
                            '
                    .
                    $data->v .

                    '       </tbody>
                    </table>
                </div>  ';
            }
            if ($data->d !== "") {

                $text .=  '<br>
                <br>
                <h3>DATOS: ' . $this->numbers[$i]->msisdn . '</h3>
                <div class=" class="area" >
                    <table class="TablaDatos">
                        <tbody>
                            <tr>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                            </tr>
                            ' .
                    $data->d
                    . '
                        </tbody>
                    </table>
                    </div>';
            }
            if ($data->sms !== "") {
                $text .= '
                <br>
                <br>
                <h3>SMS: ' . $this->numbers[$i]->msisdn . '</h3>
                <div class="area" >
                    <table class="tablaSMS">
                        <tbody>
                            <tr>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                            </tr>
                            ' .
                    $data->sms
                    . '
                        </tbody>
                    </table>
                </div>';
            }

            if ($data->iv !== "") {
                $text .=
                    '
                <h3>LLAMADAS INTERNACIONALES: ' . $this->numbers[$i]->msisdn  . '</h3>
                <div class="area">
                    <table class="tablaLLamadas">
                        <tbody>
                            <tr>
                                <th>FECHA</th>
                                <th>OPERA/PAIS</th>
                                <th>DESTINO</th>
                               
                                <th>PLAN</th>
                                <th>HORA</th>
                                <th>DURACIÓN</th>
                                <th>IMPORTE</th>
                                <th>FECHA</th>
                                <th>OPERA/PAIS</th>
                                <th>DESTINO</th>
                               
                                <th>PLAN</th>
                                <th>HORA</th>
                                <th>DURACIÓN</th>
                                <th>IMPORTE</th>
                            </tr>
                            '
                    .
                    $data->iv .

                    '       </tbody>
                    </table>
                </div>  ';
            }

            if ($data->id !== "") {

                $text .=  '<br>
                <br>
                <h3>DATOS INTERNACIONALES: ' . $this->numbers[$i]->msisdn . '</h3>
                <div class=" class="area" >
                    <table class="TablaDatos">
                        <tbody>
                            <tr>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                            </tr>
                            ' .
                    $data->id
                    . '
                        </tbody>
                    </table>
                    </div>';
            }

            if ($data->isms !== "") {
                $text .= '
                <br>
                <br>
                <h3>SMS INTERNACIONALES: ' . $this->numbers[$i]->msisdn . '</h3>
                <div class="area" >
                    <table class="tablaSMS">
                        <tbody>
                            <tr>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>TRÁFICO</th>
                                <th>PLAN</th>
                                <th>IMPORTE</th>
                            </tr>
                            ' .
                    $data->isms
                    . '
                        </tbody>
                    </table>
                </div>';
            }





            $substotalTotal = number_format($subtotalimport->importD + $subtotalimport->importSMS + $subtotalimport->importV + $subtotalimport->importDI + $subtotalimport->importSMSI + $subtotalimport->importVI, 2, ',', '.');


            $text .= '
       
                
            <h3>Subtotales: ' . $this->numbers[$i]->msisdn  . '</h3>
            <table  class="tableSubtotales">
                <tr>
                    <th>Destino</th>
                    <th>Cantidad</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Tráfico&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Importe</th>
                </tr>
                <tr>
                    <td>Llamadas</td>
                    <td>' . $data->countV . '</td>
                    <td>' . $this->priceExtra[0]->traffictTotalArray[$i]->call . '</td>
                    <td>' . number_format($subtotalimport->importV, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td>Datos</td>
                    <td>' . $data->countD  . '</td>
                    <td>' . $this->priceExtra[0]->traffictTotalArray[$i]->data . '</td>
                    <td>' . number_format($subtotalimport->importD, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td>MSM</td>
                    <td>' . $data->countSMS  . '</td>
                    <td>' . $this->priceExtra[0]->traffictTotalArray[$i]->sms . '</td>
                    <td>' . number_format($subtotalimport->importSMS, 1, ',', '.') . '</td>
                </tr>
                <tr>
                    <td>Internacionales LLamadas</td>
                    <td>' . $data->countIV  . '</td>
                    <td>' . $this->priceExtra[0]->traffictTotalArray[$i]->International->call . '</td>
                    <td>' . number_format($subtotalimport->importVI, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td>Internacionales Datos</td>
                    <td>' . $data->countID  . '</td>
                    <td>' . $this->priceExtra[0]->traffictTotalArray[$i]->International->data . '</td>
                    <td>' . number_format($subtotalimport->importDI, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td>Internacionales MSM</td>
                    <td>' . $data->countISMS  . '</td>
                    <td>' . $this->priceExtra[0]->traffictTotalArray[$i]->International->sms . '</td>
                    <td>' . number_format($subtotalimport->importSMSI, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td colspan="3" > SUBTOTAL</td>
                    <td>' . $substotalTotal . '</td>
                </tr>
            </table>
            ';



            if (count($this->dataBonosExtra) > 0) {

                $text .=

                    '
                <br>
                <br>
                    
                <h3>Bonos Extra: ' . $this->numbers[$i]->msisdn  . ':</h3>

                <table  class="tableSubtotales" >
                <tbody>
               
                ' .
                    $this->GetDataBonos($this->dataBonosExtra)
                    . '
                
                </tbody>
                </table>';
            }

            $text .= '</div>';
        }
        return  $text;
    }

    private function getDataLine($data)
    {
        $text = new stdClass();
        $text->v = "";
        $text->iv = "";
        $text->d = "";
        $text->id = "";
        $text->sms = "";
        $text->isms = "";

        $text->countV = 0;
        $text->countSMS = 0;
        $text->countD = 0;
        $text->countIV = 0;
        $text->countISMS = 0;
        $text->countID = 0;

        $text->importV = 0;
        $text->importSMS = 0;
        $text->importD = 0;
        $text->importVI = 0;
        $text->importSMSI = 0;
        $text->importDI = 0;









        $controlV = true;
        $controlD = true;
        $controlSMS = true;
        $controlIV = true;
        $controlIMSM = true;
        $controlID = true;


        //F I E
        for ($a = 0; $a < count($data->fecha); $a++) {

            //dos columnas y ordenarlos por fecha

            if ($data->tipo_destino[$a] == "V") {
                if ($data->tipo[$a] !== "I") {
                    $text->importV = $text->importV + $data->importe_total[$a];

                    if ($controlV) {


                        $text->v .= ' 
                            <tr>
				
                                <td>' . $data->fecha[$a] .   '</td>
                                <td>' . $data->tfno_origen[$a] . '</td>
                                <td>' . $data->tfno_destino[$a] . '</td>
                                <td>' . $data->denom_tarifa . '</td>
                                <td>' . $data->hora[$a] . '</td>
                                <td>' . $data->unidades_trafico_convert[$a] . '</td>
                                <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                           
                            ';
                        $controlV = false;
                    } else {

                        $text->v .= ' 
                            
                                <td>' . $data->fecha[$a] .   '</td>
                                <td>' . $data->tfno_origen[$a] . '</td>
                                <td>' . $data->tfno_destino[$a] . '</td>
                                <td>' . $data->denom_tarifa . '</td>
                                <td>' . $data->hora[$a] . '</td>
                                <td>' . $data->unidades_trafico_convert[$a] . '</td>
                                <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                            </tr>
                            ';
                        $controlV = true;
                    }

                    $text->countV++;
                } else {
                    $text->importVI = $text->importVI + $data->importe_total[$a];
                    if ($controlIV) {


                        $text->iv .= ' 
                        <tr>
                            <td>' . $data->fecha[$a] .   '</td>
                            <td>' . $data->tfno_origen[$a] . '</td>
                            <td>' . $data->tfno_destino[$a] . '</td>
                            <td>' . $data->denom_tarifa . '</td>
                            <td>' . $text->importV . '</td>
                            <td>' . $data->unidades_trafico_convert[$a] . '</td>
                            <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                       
                        ';
                        $controlIV = false;
                    } else {

                        $text->iv .= ' 
                        
                            <td>' . $data->fecha[$a] .   '</td>
                            <td>' . $data->tfno_origen[$a] . '</td>
                            <td>' . $data->tfno_destino[$a] . '</td>
                            <td>' . $data->denom_tarifa . '</td>
                            <td>' . $text->importV . '</td>
                            <td>' . $data->unidades_trafico_convert[$a] . '</td>
                            <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                        </tr>
                        ';
                        $controlIV = true;
                    }

                    $text->countIV++;
                }
            } else if ($data->tipo_destino[$a] == "D") {

                if ($data->tipo[$a] !== "I") {
                    $text->importD = $text->importD + $data->importe_total[$a];
                    if ($controlD) {
                        $text->d .= ' 
                <tr>
                    <td>' . $data->fecha[$a] .   '</td>
                    <td>' . $data->hora[$a] . '</td>
                    <td>' . $data->unidades_trafico_convert[$a] . '</td>
                    <td>' . $data->denom_tarifa . '</td>
                    <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
               
                ';
                        $controlD = false;
                    } else {

                        $text->d .= ' 
                    
                        <td>' . $data->fecha[$a] .   '</td>
                        <td>' . $data->hora[$a] . '</td>
                        <td>' . $data->unidades_trafico_convert[$a] . '</td>
                        <td>' . $data->denom_tarifa . '</td>
                        <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                    </tr>
                    ';
                        $controlD = true;
                    }

                    $text->countD++;
                } else {
                    $text->importDI = $text->importDI + $data->importe_total[$a];
                    if ($controlID) {
                        $text->id .= ' 
                        <tr>
                            <td>' . $data->fecha[$a] .   '</td>
                            <td>' . $data->hora[$a] . '</td>
                            <td>' . $data->unidades_trafico_convert[$a] . '</td>
                            <td>' . $data->denom_tarifa . '</td>
                            <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                       
                        ';
                        $controlID = false;
                    } else {

                        $text->id .= ' 
                            
                                <td>' . $data->fecha[$a] .   '</td>
                                <td>' . $data->hora[$a] . '</td>
                                <td>' . $data->unidades_trafico_convert[$a] . '</td>
                                <td>' . $data->denom_tarifa . '</td>
                                <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                            </tr>
                            ';
                        $controlID = true;
                    }

                    $text->countID++;
                }
            } else if ($data->tipo_destino[$a] == "S") {
                if ($data->tipo[$a] !== "I") {
                    $text->importSMS = $text->importSMS + $data->importe_total[$a];
                    if ($controlSMS) {
                        $text->sms .= ' 
                <tr>
                    <td>' . $data->fecha[$a] .   '</td>
                    <td>' . $data->hora[$a] . '</td>
                    <td>' . $data->unidades_trafico_convert[$a] . '</td>
                    <td>' . $data->denom_tarifa . '</td>
                    <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                
                ';
                        $controlSMS = false;
                    } else {
                        $text->sms .= ' 
                
                    <td>' . $data->fecha[$a] .   '</td>
                    <td>' . $data->hora[$a] . '</td>
                    <td>' . $data->unidades_trafico_convert[$a] . '</td>
                    <td>' . $data->denom_tarifa . '</td>
                    <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                </tr>
                ';
                        $controlSMS = true;
                    }

                    $text->countSMS++;
                } else {
                    $text->importSMSI = $text->importSMSI + $data->importe_total[$a];

                    if ($controlIMSM) {
                        $text->isms .= ' 
                    <tr>
                        <td>' . $data->fecha[$a] .   '</td>
                        <td>' . $data->hora[$a] . '</td>
                        <td>' . $data->unidades_trafico_convert[$a] . '</td>
                        <td>' . $data->denom_tarifa . '</td>
                        <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                    
                    ';
                        $controlIMSM = false;
                    } else {
                        $text->isms .= ' 
                    
                        <td>' . $data->fecha[$a] .   '</td>
                        <td>' . $data->hora[$a] . '</td>
                        <td>' . $data->unidades_trafico_convert[$a] . '</td>
                        <td>' . $data->denom_tarifa . '</td>
                        <td class="separation">' . number_format($data->importe_total[$a], 2, ',', '.') . '</td>
                    </tr>
                    ';
                        $controlIMSM = true;
                    }

                    $text->countISMS++;
                }
            }
        }

        return array($text);
    }
    private function GetDataBonos($data)
    {
        $text = "";
        for ($i = 0; $i < count($data); $i++) {
            $text .= '
            <tr>
                <td>' . $data[$i]->denom_tarifa_bono . '</td>
                <td>' . number_format($data[$i]->importe_cuota, 2, ',', '.') . '</td>
            </tr>';
        }
        return $text;
    }
    private function GetTotalBonos($data)
    {
        $this->bonosExtra = "";


        for ($i = 0; $i < count($data); $i++) {
            $this->bonosExtra .= '
            <tr>
               <td colspan="3">' . $data[$i]->denom_tarifa_bono . ' (' . $data[$i]->msisdn . ')</td>
               <td class="serviciosFacturadosDerecha">' . number_format($data[$i]->importe_cuota, 2, ',', '.')  . '</td>
               <td class="serviciosFacturadosDerecha">' . number_format($data[$i]->importe_cuota, 2, ',', '.') . '</td>
            </tr>';


            $this->priceBonos = $this->priceBonos + round($data[$i]->importe_cuota, 2);
            // $this->total=$this->total+round( $data[$i]->importe_cuota * $this->iva ,2);
            //$this->importIva=$this->importIva + $this->priceBonos*$this->iva2;
        }
    }

    private function GetTarifas($data)
    {
        $this->contentTarifas = "";
        for ($i = 0; $i < count($data->numbers); $i++) {
            $this->contentTarifas .= '
            <tr>
                <td colspan="3">' . $data->numbers[$i]->denom_tarifa . ' (' . $data->numbers[$i]->msisdn . ')</td>
                <td class="serviciosFacturadosDerecha">' . number_format($data->numbers[$i]->importe_cuota, 2, ',', '.') . '</td>
                <td class="serviciosFacturadosDerecha">' . number_format($data->numbers[$i]->importe_cuota, 2, ',', '.') . '</td>
            </tr>';


            $this->priceTarifas += round($data->numbers[$i]->importe_cuota, 2);
            //$this->total=$this->total+round(  $data->numbers[$i]->importe_cuota * $this->iva,2);
            //$this->importIva=$this->importIva + $data->numbers[$i]->importe_cuota*$this->iva2;
        }
    }
    private function GetDescuentos()
    {

        $this->contentDescuentos = "";


        for ($i = 0; $i < count($this->descuentos); $i++) {
            $this->contentDescuentos .= '
                <tr>
                    <td colspan="3"> Descuento tarifa' . $this->descuentos[$i]->denom_tarifa_bono . ' (' . $this->descuentos[$i]->msisdn . ')</td>
                    <td class="serviciosFacturadosDerecha">- ' . number_format($this->descuentos[$i]->importe_cuota, 2, ',', '.') . '</td>
                    <td class="serviciosFacturadosDerecha">- ' . number_format($this->descuentos[$i]->importe_cuota, 2, ',', '.') . '</td>
                </tr>';


            $this->totalDescuentos = $this->totalDescuentos + round(floatval($this->descuentos[$i]->importe_cuota), 2);

            //$this->importIva=$this->importIva - floatval($this->descuentos[$i]->importe_cuota*$this->iva2);

            //$this->total=$this->total-round(floatval($this->descuentos[$i]->importe_cuota * $this->iva),2);

        }
    }
}
