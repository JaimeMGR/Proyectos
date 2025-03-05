/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejercicio_1;

/**
 *
 * @author damci
 */
public class Ejercicio_1 {

    static final double PI=3.1416;
    static final String LENGUAJE = "JAVA";
    public static void main(String[] args) {
        short a = 10;
        int b = 60000;
        float c = 8.9f;
        char d = 70;
        char e = (char) (d + 2);
        double suma = (PI + c);
        
        a = (byte) c;
        
        System.out.println("El valor de a es " + a);
        System.out.println("El valor de b es " + b);
        System.out.println("El valor de c es " + c);
        System.out.println("El valor de d es " + d);       
        System.out.println("El valor de e es " + e); 

        
        System.out.println("La multiplicación de a por b es " + (a * b));
        System.out.println("La multiplicación de b por c es " + (b * c));
        System.out.println("La suma de c mas el número pi es " + suma);
        System.out.println("Este programa ha sido realizado desde " + LENGUAJE);   
    }
}