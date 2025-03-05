/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.bucles;

/**
 *
 * @author damci
 */
public class Bucles {
    public static void main(String[] args) {
        int i = 0;
        int suma = 0;
        
        for (i = 0; i < 10; i=i + 3)
        {
            System.out.println(i);
            suma = suma + i;
        }
        
        System.out.println ("Valor final de i: " + i);
        System.out.println ("Valor final de la suma: " + suma);        
    }
}
