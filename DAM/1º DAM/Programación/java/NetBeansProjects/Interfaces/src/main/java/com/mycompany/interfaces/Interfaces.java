/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.interfaces;

/**
 *
 * @author damci
 */
public class Interfaces {
    public static void main(String[] args) {
        Tren t = new Tren("013", 0);
        System.out.println(t.getIdVehículo());
        System.out.println("Velocidad: " + t.getVelocidad());
        for (int i=0; i<20; i++)
            t.acelerar();
        System.out.println("Velocidad: " + t.getVelocidad());
        t.imprimirUbicacionGeografica();
        t.resumirMetodosTren();

        System.out.println("-------------------------------------------------------------------------------------");
        
        Bicicleta b = new Bicicleta("Paco", 10);
        System.out.println(b.getIdVehículo());
        System.out.println("Velocidad: " + b.getVelocidad());
        for (int i=0; i<20; i++)
            b.acelerar();
        System.out.println("Velocidad: " + b.getVelocidad());
        b.imprimirUbicacionGeografica();
        b.resumirMetodosBicicleta();
}
}
