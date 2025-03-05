/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figura;

/**
 *
 * @author damci
 */
public class Triangulo extends Figura implements ILados {
    //declaramos dos variables para el triángulo
    public double base;
    public double altura;
 
    //Hacemos un getter y setter de los elementos
    @Override
    public double getLado() {
        return lado;
    }

    @Override
    public void setLado(double lado) {
        this.lado = lado;
    }

    @Override
    public double getRadio() {
        return radio;
    }

    @Override
    public void setRadio(double radio) {
        this.radio = radio;
    }

    @Override
    public double getBase() {
        return base;
    }

    @Override
    public void setBase(double base) {
        this.base = base;
    }

    @Override
    public double getAltura() {
        return altura;
    }

    @Override
    public void setAltura(double altura) {
        this.altura = altura;
    }

    @Override
    public int getNumLados() {
        return numLados;
    }

    @Override
    public void setNumLados(int numLados) {
        this.numLados = numLados;
    }

    
    public Triangulo(double base, double altura) {
        this.base = base;
        this.altura = altura;
    }
    
    @Override
    public double calculaArea() {
        return (base * altura) / 2;
    }
    
    @Override
    public int numLados() {
        return 3;
    }
    

    
}