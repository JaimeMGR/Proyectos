/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.cuadradoasterisco;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class CuadradoAsterisco{
    public static void main(String[] args) {      
       Scanner teclado = new Scanner(System.in);
        System.out.print("Introduzca el lado del cuadrado: ");
        int lado = teclado.nextInt();
        teclado.close();
 
        System.out.println();
        for(int fila=1; fila<=lado; fila++){
            for(int col=1; col<=lado; col++){
                if(fila==1 || fila==lado || col==1 || col==lado){
                    System.out.print("*");
                }
                else{
                    System.out.print(" ");
                }
            }
            System.out.println();
        }
    }
}