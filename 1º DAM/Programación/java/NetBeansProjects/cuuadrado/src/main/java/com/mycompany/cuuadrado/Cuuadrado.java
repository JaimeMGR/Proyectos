/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.cuuadrado;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Cuuadrado {

    public static void main(String[] args) {
       Scanner sc = new Scanner(System.in);
        System.out.print("Introduzca el lado del cuadrado: ");
        int lado = sc.nextInt();
        String laado = Integer.toString (lado);
        Integer.parseInt(laado);
        while (IsDigit(laado)){
        if (lado >=0 || lado<= 0){
        sc.close();
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
    private static boolean IsDigit(String laado){
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody     
    
}
}
}
}
}
