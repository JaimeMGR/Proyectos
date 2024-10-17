<?php

// $obj = $this->db->fetch_object($resFkSocPeople);
require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';

class Query
{

    private $db;
    private $db_user = 'root';
    private $db_pass = '';
    private $db_db = "dolibarr";
    private $db_ip = 'localhost';

    public function __construct($db)
    {

        $this->db = $db;
    }

    /**
     * Devuelve el nombre,dni, id de las empresas asociadas a freepbx 
     * @return array [[rowid=>2 ,nom=>yamil ,sirem=>DNI,address=>direccion,zip=>cp,town=>ciudad,fk_departement=>3],[rowid=>2 ,nom=>yamil ,sirem=>DNI,address=>direccion,zip=>cp,town=>ciudad,fk_departement=>3]]
     */
    public function getUsers($condition)
    {

        $sqlFkUser = "SELECT fk_object FROM `llx_societe_extrafields` WHERE pbx=1";
        $resFkUser = $this->db->query($sqlFkUser);
        $rowFkUser = $resFkUser->fetch_all(MYSQLI_ASSOC);
        if (count($rowFkUser) == 0) {
            return array();
        }
        $arrayFkUser = array();
        for ($i = 0; $i < count($rowFkUser); $i++) {
            array_push($arrayFkUser, $rowFkUser[$i]["fk_object"]);
        }

        $fkIds = implode(",", $arrayFkUser);
        $sqlUSer = "SELECT rowid,nom,siren,address,zip,town,fk_departement,tms FROM `llx_societe` WHERE rowid in ($fkIds)".$condition;
        $resUser = $this->db->query($sqlUSer);
        return $resUser->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Devuelve todos los numeros de telefono asociados a la empresa
     *	@param	int $user id de la empresa
     * @return array [[freepbx=>1232],[freepbx=>123232]]
     */
    public function getNumber($user)
    {
        $sqlFkSocPeople = "SELECT rowid FROM `llx_socpeople` WHERE fk_soc= $user;";
        $resFkSocPeople = $this->db->query($sqlFkSocPeople);
        $rowFkSocPeople = $resFkSocPeople->fetch_all(MYSQLI_ASSOC);

        if (count($rowFkSocPeople) == 0) {
            return array();
        }
        $arrayFkObject = array();
        for ($i = 0; $i < count($rowFkSocPeople); $i++) {
            array_push($arrayFkObject, $rowFkSocPeople[$i]["rowid"]);
        }
        $fkIds = implode(",", $arrayFkObject);
        $sqlPhone = "SELECT voip FROM `llx_socpeople_extrafields` WHERE fk_object in ($fkIds);";
        $resPhone = $this->db->query($sqlPhone);
        return $resPhone->fetch_all(MYSQLI_ASSOC);
    }

    public function getServices($user){

        $sqlFkSocPeople = "SELECT rowid FROM `llx_socpeople` WHERE fk_soc= $user;";
        $resFkSocPeople = $this->db->query($sqlFkSocPeople);
        $rowFkSocPeople = $resFkSocPeople->fetch_all(MYSQLI_ASSOC);

        if (count($rowFkSocPeople) == 0) {
            return array();
        }
        $arrayFkObject = array();
        for ($i = 0; $i < count($rowFkSocPeople); $i++) {
            array_push($arrayFkObject, $rowFkSocPeople[$i]["rowid"]);
        }
        $fkIds = implode(",", $arrayFkObject);
        $sqlService = "SELECT servicioref FROM `llx_socpeople_extrafields` WHERE fk_object in ($fkIds);";
        $resService = $this->db->query($sqlService);
        return $resService->fetch_all(MYSQLI_ASSOC);
    }

    public function getPrice($nombreservicio){
        $sqlPrice = "SELECT price FROM `llx_product` WHERE ref = ('$nombreservicio');";
        $resPrice = $this->db->query($sqlPrice);
        return $resPrice->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Devuelve el pais 
     *	@param	int $id pais
     * @return string pais
     */
    public function getDepartement($id)
    {
        $sqlDepartament = "SELECT nom FROM `llx_c_departements` WHERE rowid=$id";
        $resDepartament = $this->db->query($sqlDepartament);
        $obj = $this->db->fetch_object($resDepartament);
        return $obj->nom;
    }



    /**
     * Crea un servicio
     *	@param	int $id servicio
     * @return object product
     */
    public function createService($rowProduct)
    {
        $this->product = new Product($this->db);
        $this->product->fetch($rowProduct);

        return  $this->product;
    }
    /**
     * busca todos los ids de los servicios asociados a un usuario
     *	@param	int $id userio
     * @return array [2,4,5,4,6,9]
     */
    public function searchService($userId)
{
    // Aquí asumo que tienes una tabla en tu base de datos para almacenar servicios y que la columna de identificación es "id_service".
    // Puedes adaptar esto según la estructura de tu base de datos.
    
    // Realiza una búsqueda en la base de datos para encontrar el servicio con el ID proporcionado
    $serviceData = $this->db->query("SELECT * FROM servicios WHERE id_service = ?", [$userId])->fetch();

    if (!$serviceData) {
        // Si no se encuentra el servicio, puedes devolver null o lanzar una excepción según tu caso de uso.
        return null;
    }

    // Crea una nueva instancia de Product y carga los datos del servicio encontrado.
    $service = new Product($this->db);
    $service->fetch($serviceData);

    return $service;
}



    /**
     * obtiene la información necesaria para crear la factura de freepbx 
     *	@param	int $number numero de telefono
     * @return array 
     */
    public function getDataFreepbx($number, $year, $month)
    {
        $db = $this->connectarDBFreepbx();
        $dates = $this->generateDates($year, $month);
        $start = $dates["start"];
        $end = $dates["end"];


        //$sql = "SELECT calldate,src,billsec, dst FROM `cdr` WHERE src='$number' AND disposition='ANSWERED' AND dcontext='from-internal'";
        //2015-06-03 12:18:16
        //estos condicionales hay que añadir mas condiciones para que sean las llamadas que hay que facturar
        $sql = "SELECT calldate,src,billsec, dst FROM `cdr` WHERE src='$number' AND calldate>= '$start'AND calldate<='$end' ";
        $res = $db->query($sql);
        $rows = $res->fetch_all(MYSQLI_ASSOC);

        $reg = "/abcdefg/";


        for ($i = 0; $i < count($rows); $i++) {
            $number = $rows[$i]["dst"];

            if (preg_match($reg, $number)) {
            } else {
                $rows[$i]["import"] = number_format(0, 2, ",", ".");
            }
        }

        return $rows;
    }
    private function connectarDBFreepbx()
    {

        return new mysqli($this->db_ip, $this->db_user, $this->db_pass, $this->db_db);
    }
    private function generateDates($year, $month)
    {
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $start = $year . "-" . $month . "-01 00:00:00";
        $end = $year . "-" . $month . "-" . $day . " 23:59:59";
        return array("start" => $start, "end" => $end);
    }
}
