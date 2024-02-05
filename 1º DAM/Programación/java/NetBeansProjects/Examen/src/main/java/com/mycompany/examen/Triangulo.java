/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.examen;

/**
 *
 * @author jaime
 */
public class Triangulo extends Figura implements ILados{
    private double base;
    private double altura;

    public Triangulo(double base, double altura) {
        this.base = base;
        this.altura = altura;
    }

    
    
    public double getBase() {
        return base;
    }

    public void setBase(double base) {
        this.base = base;
    }

    public double getAltura() {
        return altura;
    }

    public void setAltura(double altura) {
        this.altura = altura;
    }
    

    @Override
    public int numLados() {
        return 3;
    }    
    
    @Override
    public double calculaArea() {
        return (base * altura) / 2;
    }
    
    public String mostrar(){
        return ("El triángulo tiene: " + numLados() + " lados " + "y tiene un área de " + calculaArea());
    }
}
