/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.adivinar;
 import java.util.Random;
import java.util.Scanner;
/**
 *
 * @author damci
 */
public class Adivinar {

    public static void main(String[] args) {
    int min = 1;
    int max = 10;

    Random random = new Random();

    int numerorandom = random.nextInt(max + min) + min;

    System.out.println("Introduce el número que crees que es : ");
    Scanner sc = new Scanner(System.in);
    int Numero=sc.nextInt();
    int intentos=5;
    while (numerorandom!=Numero && intentos!=0)
    {
        intentos = intentos -1;
        if (numerorandom>Numero){
            System.out.println("Prueba con un número más grande");
            System.out.println("Te quedan " + intentos + " intentos");
            System.out.println("Introduce el número que crees que es : ");
            Numero=sc.nextInt();
        }else if (numerorandom<Numero){
            System.out.println("Prueba con un número más pequeño");
            System.out.println("Te quedan " + intentos + " intentos");
            System.out.println("Introduce el número que crees que es : ");
            Numero=sc.nextInt();

        }
    }
     if (intentos == 0){ 
         System.out.println("Te has quedado sin intentos");
     }
     else if (numerorandom==Numero){
                 System.out.println("HAS ACERTADO");
     }
    }
}