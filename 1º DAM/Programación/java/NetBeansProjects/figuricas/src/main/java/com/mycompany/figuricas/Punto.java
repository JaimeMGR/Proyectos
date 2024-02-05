/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figuricas;

/**
 *
 * @author damci
 */
public class Punto {
    private double x;
    private double y;
    public Punto(double x, double y) {
        this.x = x;
        this.y = y;
    }
    public Punto() {
        x = 0;
        y = 0;
    }
    public double getX() {
        return x;
    }
    public void setX(float x) {
        this.x = x;
    }
    public double getY() {
        return y;
    }
    public void setY(float y) {
        this.y = y;
    }
    @Override
    public String toString() {
        return "Punto{" +
                "x=" + x +
                ", y=" + y +
                '}';
    }
}