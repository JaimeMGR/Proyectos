/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.nombretelefono;

import java.util.Scanner;
import java.util.regex.Pattern;

/**
 *
 * @author damci
 */
public class Nombretelefono {

    public static void main(String[] args) {
        System.out.println("Introduce nombre: ");
        System.out.println("Introduce número: ");
        Scanner sc = new Scanner(System.in);
        String regExNumero = "[6|7|9][0-9]{8}";
        String Nombre=sc.nextLine();
        String Numero=sc.next();

        if (Pattern.matches(regExNumero, Numero))
        {
        System.out.println("Datos del usuario");
        System.out.println(Nombre);
        System.out.println(Numero);
        }
        else
        {
        System.out.println("Datos del usuario");
        System.out.println(Nombre);    
        System.out.println("N/A");
        }
    }
}

