/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.figura;

/**
 *
 * @author damci
 */
public abstract class Figura { //Declaramos el método como abstracto

    //Primero declaramos las variables que se usarán en los constructores
    protected double lado;
    protected double radio;
    protected final double PI = 3.1416;
    protected double base;
    protected double altura;
    protected int numLados = 4;
    
    //Ahora creamos el método para calcular el área

    public double calculaArea(){
        return (base * altura) / 2;
    }
    
    //Hacemos un getter y setter de las variables
    public double getLado() {
        return lado;
    }

    public void setLado(double lado) {
        this.lado = lado;
    }

    public double getRadio() {
        return radio;
    }

    public void setRadio(double radio) {
        this.radio = radio;
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

    public int getNumLados() {
        return numLados;
    }

    public void setNumLados(int numLados) {
        this.numLados = numLados;
    }

    public int numLados() {
        return 0;
    }
    
    //Creamos los métodos mostrar() para cada tipo de figura
    
    public String mostrartriangulo() {
        return "Triángulo: base = " + base + ", altura = " + altura + ", número de lados = " + numLados() + ", superficie = " + calculaArea();
    }
    
    public void mostrarcuadrado() {
        System.out.println("Cuadrado: número de lados = " + numLados() + ", superficie = " + calculaArea());
    }
      
    public void mostrarcirculo() {
        System.out.println("Círculo:");
        System.out.println("  Superficie: " + calculaArea());
    }
}

