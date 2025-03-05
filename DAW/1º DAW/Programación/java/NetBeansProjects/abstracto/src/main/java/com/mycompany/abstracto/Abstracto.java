/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.abstracto;

/**
 *
 * @author damci
 */
public class Abstracto {
    public static void main(String[] args) {
        new Subclase().metodoAbstracto();
        Animal Totti = new Perro(4,1,1);
        Animal Doraemon = new Gato(4,1,1);
        Animal Piti = new Ave(2,2,1);
        
        
        System.out.println(Totti.toString());
        System.out.println(Doraemon.toString());
        System.out.println(Piti.toString());
    }
}
