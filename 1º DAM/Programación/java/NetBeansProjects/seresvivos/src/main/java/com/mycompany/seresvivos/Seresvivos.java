/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.seresvivos;

/**
 *
 * @author damci
 */
public class Seresvivos {

    public static void main(String[] args) {
    
        animales León = new animales("Panthera leo","Perro","80 kg", "180 cm", "Carne");
        animales Tortuga = new animales("Testudines","Tortuga","5 kg", "50 cm", "Plantas/vegetales");
        vegetales Girasol = new vegetales("Helianthus annuus","Girasol","150 cm", "Con la luz del sol");
        
        
        System.out.println(León.toString());
        System.out.println(Tortuga.toString());
        System.out.println(Girasol.toString());
    }
}
