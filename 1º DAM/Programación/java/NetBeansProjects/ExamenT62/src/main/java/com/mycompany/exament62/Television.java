/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament62;

/**
 *
 * @author damci
 */
public class Television  extends Electrodomestico{
    int resolucion;
    boolean Netflix;
    public Television(Float precioBase, String color, char consumo, int peso,int resolucion, boolean Netflix) {
        super(precioBase, color, consumo, peso);
        this.resolucion = resolucion;
        this.Netflix = Netflix;
    }
        @Override
    Float precioFinal() {
        float precio = super.precioFinal();
        
        if (resolucion > 20) precio = precio + (precioBase*.30f);
        if (Netflix) precio = precio + 50;
        
        return precio;
    }
    
        @Override
    public String toString() {
        return super.toString() + ", resolución: " + resolucion + ", netflix: " + Netflix;
    }
}
