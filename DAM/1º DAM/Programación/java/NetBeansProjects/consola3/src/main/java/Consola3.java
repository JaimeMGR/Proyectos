/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */
package com.mycompany.consola3;

import java.util.Date;

/**
 *
 * @author damci
 */
public class Consola3 {
    public static void main(String[] args){
/*
        java.io.Console c = System.console();
    if (c == null)
        System.err.println("No hay consola.");
    else{
        System. out.println("Introduzca su nombre: ");
        String nombre = c.readLine();
        System. out.println("Hola "+nombre);
        System. out.println("Introduzca su password: ");
        String password = String.valueOf(c.readPassword());
        System.out.println("Su Password es: "+password) ;
        }
    
        int iva = 21;
        float total = 23.1290f;
        System.out.println("Total: " + total + " Euros");
        System.out.printf("Base imponible: %010.2f.%nIVA: %d. Total: %.2f Euros", iva, total);
        
        String cadena ="Hola";
        String nombre ="Luis";
        System.out.printf("Cadena vale %s y el nombre %S", cadena, nombre);
        
        boolean booleano = false;
        System.out.printf("Mostrando booleanos %b %b", booleano, 8);
*/        
       Date fecha = new Date();
       System.out.printf("Hoy es %1$td/%1$$tm/%1$tY %1$tH:%1$tM", fecha);
    }
}
