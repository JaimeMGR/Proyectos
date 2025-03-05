/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package com.mycompany.figura;

/**
 *
 * @author damci
 */
public class Main {

    public static void main(String[] args) {
        //Creamos cada figura con los constructores
        Figura circulo = new Circulo(10); 
        Figura triangulo = new Triangulo(5, 3);
        Figura cuadrado = new Cuadrado(5);
        
        //Las mostramos en pantalla
        circulo.mostrarcirculo();
        
        triangulo.mostrartriangulo();
        
        cuadrado.mostrarcuadrado();
    }
}



