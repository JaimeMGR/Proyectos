/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.examen;

/**
 *
 * @author jaime
 */
public class Circulo extends Figura{
    private double radio;
    private double PI=3.1416;
    
    
    public double getRadio() {
        return radio;
    }

    public void setRadio(double radio) {
        this.radio = radio;
    }

    public double getPI() {
        return PI;
    }

    public void setPI(double PI) {
        this.PI = PI;
    }


    public Circulo(double radio) {
        this.radio = radio;
    }

    @Override
    public double calculaArea() {
        return PI * radio * radio;
    }
    
    public String mostrar(){
        return ("El circulo tiene un área de : " + calculaArea());
    }
}
