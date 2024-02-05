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
public final class Circulo {
    static final double PI = 3.1416;
    double radio;
    double altura;
    double area;

    public Circulo(double radio, double altura) {
        this.radio = radio;
        this.altura = altura;
        this.area = PI * Math.pow(radio, 2);
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
}

