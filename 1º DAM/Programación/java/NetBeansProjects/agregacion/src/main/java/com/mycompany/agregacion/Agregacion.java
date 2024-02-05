/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.agregacion;

/**
 *
 * @author damci
 */
public class Agregacion {

    public static void main(String[] args) {
    Persona p1 = new Persona("Carlos","Alonso", null);
    Persona p2 = new Persona("julia", "Alonso", p1);
            
    Persona p3 = new Persona("Carmen", "López",
            new Persona("Pepe", "López", null));
    Persona p4 = p3.getPadre();
    p4.setNombre("José");
    
    
        System.out.println(p1);
        System.out.println(p2);
        System.out.println(p3);
        System.out.println(p4);
    }
}
