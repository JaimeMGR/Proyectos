<?php


class CreateFacture
{
    private $user;
    private $db;
    private $facture;
    private $ref;
    private $resultFacture;

    /**
     * Crea el objeto factura 
     * @param int $year año de la factura 2022
     * @param int $mont mes de la factura 3
     * @param user $user usuario que realiza la factura variable de dolibarr $user
     * @param int $socid empresa a la que va dirigida la factura
     * @return  int positivo id de factura, negativo algun error 
     */
    public function __construct($db, $socid, $user, $year, $month)
    {
        require_once DOL_DOCUMENT_ROOT . '/compta/facture/class/facture.class.php';
        $this->db = $db;
        $this->user = $user;
        $this->facture = new Facture($db,  $socid);
        $this->facture->ref_client = "Rapinet";
        $this->facture->socid =  $socid;
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $newdate = dol_mktime(0, 0, 0, $month, $day, $year, 'tzserver');
        $this->facture->date = $newdate;
        $this->resultFacture = $this->facture->create($user);
        $this->ref = $this->facture->ref;
        if ($this->resultFacture >= 0) {
            $this->facture->validate($user);
        }
        return $this->resultFacture;
    }

    /**
     * Devuelve si la factura se ha creado de forma correcta
     * @return boolean true || false
     */
    public function getResultCreate()
    {
        return  $this->resultFacture;
    }

    /**
     * Devuelve la referencia de la factura
     * @return string rf3743
     */
    public function getRefFacture()
    {
        return $this->ref;
    }

    /**
     * inserta el servicio
     * @param object Product
     * @return int  positivo 
     */
    
    public function insertService($servicio)
    {
        return  $this->facture->addline($servicio->description, $servicio->price, 1, $servicio->tva_tx, 0, 0, 0, 0, '', '', 0, 0, '', $servicio->price_base_type, $servicio->price_ttc, $servicio->type);
    }
    /**
     * inserta una linea de factura
     * @param string $desc Descripcion de la linia 
     * @param  double $import el importe sin iva
     * @param   int $qty cantidad en principio por defecto es 1
     * @param  double $iva por defecto es 21.00 si es necesario otro iva añadir es parametro
     * @return boolean true || false
     */

    public function insertLine($desc, $import, $qty = 1, $iva = 21.0000)
    {

        return  $this->facture->addline(
            $desc, //desc
            round($import, 2), // pu_ht
            $qty, // qty
            $iva, // txtva
            0, // txlocaltax1 
            0, // txlocaltax2 
            0, // fk_product
            0, // remise_percent 
            '', //date_start
            '', //date_end
            0, //ventil 
            0, //info_bits
            0, //fk_remise_except 
            "HT", //price_base_type
            round($import, 2), //pu_ttc
            1, //type 
            -1, //rang 
            0, //special_code 
            '', //origin
            0, //origin_id
            0, //fk_parent_line
            null, //fk_fournprice
            0, //pa_ht
            '', //label
            0, //array_options
            100, //situation_percent
            0, //fk_prev_id
            null, //fk_unit
            0, //pu_ht_devise
            '', //ref_ext
            0, //noupdateafterinsertline
        );

        
    }

 /* 
 * crea un objeto producto
 * @param  int $rowProduct id del producto a crear
 * @return object del producto
 */
    public function getProduct($rowProduct)
    {
        require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
        
        $this->product = new Product($this->db);
        $this->product->fetch($rowProduct->rowid);

        return  $this->product;
    }

    /*     private function validate()
    {
        +$this->ref = $this->facture->getNextNumRef($this->user);

        return  $this->facture->validate($this->user, "", "");
    }
    */
}
