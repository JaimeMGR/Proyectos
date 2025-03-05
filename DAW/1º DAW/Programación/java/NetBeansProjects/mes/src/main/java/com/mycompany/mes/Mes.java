/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.mes;

/**
 *
 * @author damci
 */
public class Mes {

public static void main(String[] args) {
String mes=args[0];
String mesLower=mes.toLowerCase();
String mesLowerCap=mesLower.toUpperCase().charAt(0) +mes.substring(1, mesLower.length()).toLowerCase();

switch(mesLower){
    
    case "enero","marzo","mayo","julio","agosto","octubre","diciembre" ->          {
        {
            System.out.println(mesLowerCap + " tiene 31 dias");
        }
         }
    case "abril","junio","septiembre","noviembre" ->          {
        {
            System.out.println(mesLowerCap + " tiene 30 dias");
        }
         }
    case "febrero" ->          {
        {
            System.out.println(mesLowerCap + " tiene 28 dias");
        }
         }
        default -> System.out.println("Eso no es un mes");
        }

    }
}