/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.flush;

/**
 *
 * @author damci
 */
public class Flush {

    public static void main(String[] args) {
        System.out.println("Probando");
        System.out.write(74);
        System.out.write(65);
        System.out.write(73);
        System.out.write(77);
        System.out.write(69);
        System.out.println("");
        System.out.write(71);
        System.out.write(85);
        System.out.write(65);
        System.out.write(80);
        System.out.write(79);
        System.out.flush();
    }
}
