/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public class Interfazanimales {

    public static void main(String[] args) {
    Perro p = new Perro("Pluto", 10000);
    p.mover(10, 20);
    p.comer(300);
    p.informe();
    
    }
}
