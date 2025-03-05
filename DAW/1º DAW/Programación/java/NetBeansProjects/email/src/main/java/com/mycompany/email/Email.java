/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.email;

import java.util.Scanner;
import java.util.regex.Pattern;

/**
 *
 * @author damci
 */
public class Email {

    public static void main(String[] args) {
        System.out.println("Introduzca email");
        Scanner sc = new Scanner(System.in);
        
        String regExMail = "[a-zA-Z0-9 +&*-]+(?:\\.[a-zA-Z0-9 +&*-]+)*@"
                + "(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,7}";
        
        String correo = sc.next();
        boolean esCorreo = Pattern.matches(regExMail, correo);
        if (esCorreo) System.out.println("Correo registrado");
        else System.out.println("Correo inválido");
        
        //Comprobar expresión regular con correo, más compacto
        if (Pattern.matches(regExMail, correo))
            System.out.println("Correo registrado");
        else System.out.println("Correo inválido");
    }
}
