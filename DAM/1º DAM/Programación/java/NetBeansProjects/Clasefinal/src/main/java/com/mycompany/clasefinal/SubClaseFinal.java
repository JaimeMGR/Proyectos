/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.clasefinal;

/**
 *
 * @author damci
 */
public class SubClaseFinal extends Clase_final{
    final double PI= 3.14;
    
    @Override
    public void metodoEjemplo(){
        //super.metodoEjemplo();
        System.out.println("En subclase final "
        + this.cad);
        
        super.metodoEjemplo();
    }
    
    public void metodoFinal(String cadena)
    {
        System.out.println("Sobrecargado: " + cadena);
    }
}
