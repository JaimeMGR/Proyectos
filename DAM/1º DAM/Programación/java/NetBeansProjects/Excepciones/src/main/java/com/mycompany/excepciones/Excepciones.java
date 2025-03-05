/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.excepciones;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Excepciones {

    public static void main(String[] args) {
        int a = 9;
        int b = 0;
        try
        {
            Scanner sc = new Scanner(System.in);
            System.out.println("Introduzca dividendo");
            int dividendo = Integer.parseInt(sc.nextLine());
            System.out.println("Introduzca divisor");
            int divisor = Integer.parseInt(sc.nextLine());
            System.out.println("El resultado de la división de " + dividendo + " y de " + divisor + " es " + dividendo/divisor);
        }
        catch (Exception ex)
        {
           System.out.println("Excepción: " + ex.getMessage());
            ex.printStackTrace();
        }
        finally{
            System.out.println("Fin de programa");
        }
    }
}
