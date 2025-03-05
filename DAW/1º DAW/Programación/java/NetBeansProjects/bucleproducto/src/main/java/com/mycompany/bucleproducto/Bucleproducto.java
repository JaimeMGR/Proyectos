/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.bucleproducto;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Bucleproducto {

    public static void main(String[] args) {
        Scanner sc = new Scanner (System.in);
        System.out.println("Introduzca un número");
        int n = 0;
        
        do{
            if (!sc.hasNextInt()){
                n = sc.nextInt();
                break;
            }
            else
            {
                System.out.println("Introduzca un número ENTERO");
                sc.next();
        } while (true);
        
        long producto = 1;
        
        for(int i = 1; i<=n; i++)
            producto = producto * i;
        
            System.out.println("El producto de los " + n + "primeros números es " + producto);
        
        }
    }
}

