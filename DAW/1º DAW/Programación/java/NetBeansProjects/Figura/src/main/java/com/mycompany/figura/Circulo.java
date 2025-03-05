/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figura;

/**
 *
 * @author damci
 */
public class Circulo extends Figura implements ILados {

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


    //Añadimos un constructor para circulo

    public Circulo(double radio) {
        this.radio = radio;
    }

    //añadimos la función para calcular el área
    @Override
    public double calculaArea() {
        return PI * radio * radio;
    }


    @Override
    public int numLados() {
        return 0;
    }
    

}