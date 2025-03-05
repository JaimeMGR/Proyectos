/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.suma;

/**
 *
 * @author damci
 */
public class Suma {

public static void main(String[] args) {
int suma = 0;

for(int i = 0;i<args.length;i++)
{
    suma = suma + Integer.parseInt(args[i]);
}
//String numero1=args[0];     
//String numero2=args[1];    
//String numero3=args[2];
//
//int numero1bien = Integer.parseInt(numero1);
//int numero2bien = Integer.parseInt(numero2);
//int numero3bien = Integer.parseInt(numero3);
//suma = suma + numero1bien + numero2bien + numero3bien;

System.out.println("El resultado de la suma es: " + suma);

    }
}