/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.consola2;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Consola2 {

    public static void main(String[] args) {
        System.out.println("Introduzca un número: ");
        Scanner sc = new Scanner (System.in);
        int entradaInteger = 0;
        String entradaTeclado = "";
        
        if (sc.hasNextInt())
        {
            entradaInteger = sc.nextInt();
            System.out.println("El número es: " + sc.nextInt());
        }
        else
        {
            entradaTeclado = sc.nextLine();
            System.out.println(entradaTeclado + " no es un número");
        }
    }
}
