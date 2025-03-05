/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.operaciones;

/**
 *
 * @author damci
 */
public class Operaciones {
    private int suma;

    public static void main(String[] args) {
        Operaciones o = new Operaciones();
        o.sumar(8,9);
        o.suma = 3;
        System.out.println(o.suma);
    }
    
    public void sumar(int a, int b)
    {
        int suma = a + b;
        
        this.suma = suma;
    }
}
