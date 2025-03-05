/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.password;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Password {
//Otro ejercicio bucle que calcule el producto de los n primeros números
    public static void main(String[] args) {
        int intentos = 3;
        String claveBuena = ("Clave");
        System.out.println("Introduzca la contraseña: ");
        Scanner sc = new Scanner (System.in);
        String clave = sc.nextLine();
        while (intentos !=0)
            if (clave.equals(claveBuena)){
                System.out.println("Iniciando sesión...");
                break;
            }
            else{
                intentos = intentos -1;
                System.out.println("Contraseña incorrecta");
                System.out.println("Tienes " + intentos + " intentos");
                System.out.println("Introduzca la contraseña");
                clave = sc.nextLine();
                
            }
            

    }
}

