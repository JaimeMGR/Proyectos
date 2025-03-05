/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejercicio;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Ejercicio {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        float bi = 0;
        int iva = 0;
        
        System.out.println("Introduzca Base imponible");
        if (sc.hasNextFloat())
        {
            //Base imponible correcto
            bi = sc.nextFloat();
            
            System.out.println("Introduzca IVA");
            if (sc.hasNextInt())
            {
                //IVA correcto
                iva = sc.nextInt();
                
                float total = bi+(bi*iva/100);
                System.out.println("BI: " + bi);
                System.out.println("IVA: "  +iva);
                System.out.println("Total: " + total);
                }
            else System.out.println("El IVA debe ser int");
        }
        else System.out.println("BI debe ser float");
    }
}