/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.estrellicas;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Estrellicas {

    public static void main(String[] args) {
        int contador = 0;
        System.out.println("Illo dime un número");
        Scanner sc = new Scanner(System.in);
        int estrellas=sc.nextInt();
        if (sc.hasNextInt())
        {
            contador = estrellas;
        }
        
        for(int j=estrellas; j>=1;j--){
            
            for(int i=0; i<j;i++)
              System.out.print("*");
                System.out.print("\n");
        }
    }
}
