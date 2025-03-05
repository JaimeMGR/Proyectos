/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.polimorfismo;

/**
 *
 * @author damci
 */
public class Polimorfismo {

    public static void main(String[] args) {
        Perro p1 = new Perro("Labrador");
        Perro p2 = new Mascota("Bulldog", "Princeso");
        Mascota p3 = new Mascota("" , "");
        p1.alimentar();
        p2.alimentar();
        
        //Ejecución polimorfa
        MedioTransporte objMedioTransporte = new Avion(4);
        objMedioTransporte.getInfo();
        System.out.println(objMedioTransporte.getClass().toString());
        ((Avion) objMedioTransporte).getNumMotores();
}
}
