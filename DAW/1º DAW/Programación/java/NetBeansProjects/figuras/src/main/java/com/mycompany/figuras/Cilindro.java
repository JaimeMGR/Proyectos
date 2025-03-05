/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figuras;
import com.mycompany.figuras.operaciones.Valores;
/**
 *
 * @author damci
 */
public class Cilindro {
    static final double PI = 3.1416;
    double radio;
    double altura;
    double area;
    double volumen;

    public Cilindro(double radio, double altura) {
        this.radio = radio;
        this.altura = altura;
        this.area = 2 * PI * radio * (radio + altura);
        this.volumen = PI * Math.pow(radio, 2) * altura;
    }

    public double getRadio() {
        return radio;
    }

    public double getAltura() {
        return altura;
    }

    public double getArea() {
        return area;
    }

    public double getVolumen() {
        return volumen;
    }
}

