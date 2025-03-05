/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public interface IEvolucion {
    public void hablar();
    public void pensar();
 
    default public void crearHerramienta()
    {
        System.out.println("Usar rama");
    }
}
