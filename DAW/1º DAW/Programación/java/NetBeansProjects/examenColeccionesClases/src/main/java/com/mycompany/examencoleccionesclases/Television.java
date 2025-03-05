/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.examencoleccionesclases;

/**
 *
 * @author Profesor
 */
public class Television extends Electrodomestico{
    boolean netflix;
    int resolucion;
    public Television(Float precioBase, String color, char consumo, int peso,
            boolean netflix, int resolucion) {
        super(precioBase, color, consumo, peso);
        this.netflix = netflix;
        this.resolucion = resolucion;
    }

    @Override
    Float precioFinal() {
        float precio =  super.precioFinal(); 
        if (netflix) precio = precio + 50;
        if (resolucion > 20) precio = precio + (precioBase*.30f);
        
        return precio;
    }

    @Override
    public String toString() {
        return super.toString() 
                + "; Resolución: " + resolucion + "; Netflix: " + netflix;
    }
    
    
    
}
