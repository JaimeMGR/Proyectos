/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.saludo;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Saludo {

    public static void main(String[] args) {
         System.out.print("Introducir nombre: ");
        Scanner scanner = new Scanner(System.in);
        String nombre = scanner.nextLine();
        System.out.println("Hola " + nombre);
    }
}