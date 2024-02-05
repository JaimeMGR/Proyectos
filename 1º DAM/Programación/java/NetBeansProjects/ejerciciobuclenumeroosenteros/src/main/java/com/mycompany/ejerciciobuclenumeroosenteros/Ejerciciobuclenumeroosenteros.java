/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejerciciobuclenumeroosenteros;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Ejerciciobuclenumeroosenteros {

    public static void main(String[] args) {
        int multiplicador = 1;
        int n = 0;
        System.out.println("Escribe un número entre 1 y 10");
        Scanner sc = new Scanner(System.in);
        n = sc.nextInt();
        while (n>10 || n<1){
            System.out.println("Número fuera de rango"); 
           System.out.println("Escribe un número entre 1 y 10");
            n = sc.nextInt();
        }
        while (n<11 && n>=1)
            if (multiplicador!=11){
                int cuenta = n*multiplicador;

            System.out.println(n + " multiplicado por " + multiplicador + " es igual a: ");
            System.out.println(cuenta);
            multiplicador=multiplicador+1;
            }
                System.out.println("Fin del programa");

    }
}
//
//    for(int i=0;i<=10;i++)
//{
//    System.out.println()
//}
