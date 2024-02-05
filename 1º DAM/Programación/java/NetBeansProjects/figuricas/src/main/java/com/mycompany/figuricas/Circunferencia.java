/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figuricas;

/**
 *
 * @author damci
 */
public class Circunferencia {
    private Recta radio;
    private Punto centro;
    public Circunferencia(Recta radio) {
        this.radio = radio;
        this.centro = radio.getP1();
    }
    public Circunferencia() {
        radio = new Recta();
        this.centro = radio.getP1();
    }
    public Recta getRadio() {
        return radio;
    }
    public void setRadio(Recta radio) {
        this.radio = radio;
    }
    public double calcularArea(){
        return Math.PI * Math.pow(radio.calcularLongitud(), 2);
    }
    @Override
    public String toString() {
        return "Circunferencia{" +
                "radio=" + radio +
                '}';
    }
}