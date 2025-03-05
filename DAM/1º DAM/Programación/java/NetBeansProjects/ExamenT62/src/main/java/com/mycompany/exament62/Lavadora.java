/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament62;

/**
 *
 * @author damci
 */
public class Lavadora extends Electrodomestico{
    int carga;
    public Lavadora(Float precioBase, String color, char consumo, int peso, int carga) {
        super(precioBase, color, consumo, peso);
        this.carga = carga;
    }

    @Override
    Float precioFinal() {
        float precio = super.precioFinal();
        
        if (carga > 6)
                precio = precio + 50;
    
        return precio;
    }

    @Override
    public String toString() {
        return super.toString() + ", carga: " + carga;
    }

    
}
