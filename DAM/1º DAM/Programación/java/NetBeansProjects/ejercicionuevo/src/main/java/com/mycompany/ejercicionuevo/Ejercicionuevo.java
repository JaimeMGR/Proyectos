/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejercicionuevo;

/**
 *
 * @author damci
 */
public class Ejercicionuevo {

    public static void main(String[] args) {
        System.out.println("Introduzca un número: ");
        String a = readLine();
        System.out.println("Introduzca otro número: ");
        String b = String.valueOf(readb());

        if (a > b){
        System.out.println(a + "es mayor que" + b);
        }
        else 
        {
        System.out.println(b + "es mayor que" + a);   
        }
        else
        {
        System.out.println(a + "es igual que" + b);        
        }
    }

    private static Object readb() {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }

    private static String readLine() {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }
}