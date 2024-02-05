package com.mycompany.repaso;

/**
 * Clase factura con IVA
 * Consultar {@link Factura} para mas info
 * @author damci
 * @version 1.0   
 * @since 28/11/2022
 * 
 */
public class ConIVA extends Factura{
    private float total;
    
    /**
    * Constructor de la clase
    * @param bi base imponible
    * @param iva IVA en porcentaje
    * @param total Total de la factura
    * @see <a target="_blank" href="https://www.javadesdecero.es">Informacion sobre java </a>
    */        
    public ConIVA(float bi, float iva, float total) {
        this.setBi(bi);
        this.setIva(iva);
        this.total = total;
    }
    public float getTotal() {
        return total;
    }

    public void setTotal(float total) {
        this.total = total;
    }
    
    public void calcularTotal()
    {
        this.total = this.getBi() + (this.getBi()*this.getIva());
    }
    
    
}
