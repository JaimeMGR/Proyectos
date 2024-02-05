/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.examen;

/**
 *
 * @author jaime
 */
public class Cuadrado extends Figura implements ILados{
    private double lado;

    public double getLado() {
        return lado;
    }

    public void setLado(double lado) {
        this.lado = lado;
    }

    public Cuadrado(double lado) {
        this.lado = lado;
    }

    @Override
    public int numLados() {
        return 4;}
    
    public String mostrar(){
        return ("El cuadrado tiene: " + numLados() + " lados " + "y tiene un área de " + calculaArea());
    }

    @Override
    public double calculaArea() {
        return lado * lado;
    }
}

