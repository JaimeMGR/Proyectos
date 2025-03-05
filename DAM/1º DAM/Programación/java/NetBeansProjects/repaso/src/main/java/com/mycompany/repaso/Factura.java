/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.repaso;

/**
 *
 * @author damci
 */
public class Factura {
    private float bi;
    private float iva;

    public float getBi() {
        return bi;
    }

    public float getIva() {
        return iva;
    }

    public void setBi(float bi) {
        this.bi = bi;
        this.contabilizar();
    }

    public void setIva(float iva) {
        this.iva = iva;
    }
    
    private void contabilizar()
    {
        //Crear asiento con factura
        int añoActual = 2022;
    }
}
