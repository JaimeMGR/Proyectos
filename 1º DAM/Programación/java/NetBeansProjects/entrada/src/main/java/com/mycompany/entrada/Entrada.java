/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.entrada;

/**
 *
 * @author damci
 */
public class Entrada {

    public static void main(String[] args) {
        String parametro1 = args[0];
        int p1 = Integer.parseInt(parametro1);
        String parametro2 = args[1];
        int p2 = Integer.parseInt(parametro2);
        String parametro3 = args[2];
        int p3 = Integer.parseInt(parametro3);
        String parametro4 = args[3];
        int p4 = Integer.parseInt(parametro4);
        int suma = p1 + p2 + p3 + p4;
        System.out.println("Suma: " + suma);
    }
}
