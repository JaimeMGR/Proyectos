/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figuricas;

/**
 *
 * @author damci
 */
public class Recta {
    private Punto p1;
    private Punto p2;
    public Recta(Punto p1, Punto p2) {
        this.p1 = p1;
        this.p2 = p2;
    }
    public Recta() {
        p1 = new Punto();
        p2 = new Punto();
    }
    public Punto getP1() {
        return p1;
    }
    public void setP1(Punto p1) {
        this.p1 = p1;
    }
    public Punto getP2() {
        return p2;
    }
    public void setP2(Punto p2) {
        this.p2 = p2;
    }
    public double calcularLongitud(){
        return Math.sqrt(Math.pow((p2.getX() - p1.getX()), 2) + Math.pow((p2.getY() - p1.getY()), 2));
    }
    @Override
    public String toString() {
        return "Recta{" +
                "p1=" + p1 +
                ", p2=" + p2 +
                '}';
    }
}