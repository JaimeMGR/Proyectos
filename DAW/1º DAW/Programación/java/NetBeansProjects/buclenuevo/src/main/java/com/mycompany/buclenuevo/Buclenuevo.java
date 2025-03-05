/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.buclenuevo;

/**
 *
 * @author damci
 */
public class Buclenuevo {

    public static void main(String[] args) {
                int i=0;
        int suma=0;
        int sigPar = 0;
        for (i=1;i<200;i++)
        {
            System.out.println("Suma: " + sigPar);
            suma = suma + sigPar;
            sigPar += 2;
        }
                
        System.out.println("El valor final de i es: " +i );
        System.out.println("La suma de pares es: " + suma);
                               
}
}