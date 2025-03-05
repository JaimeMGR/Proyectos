/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejercicioraro1;

/**
 *
 * @author damci
 */
public class Ejercicioraro1 {

    public static void main(String[] args) {
        A: while (true) {
            System.out.println("Dentro de A");
            B: while (true){
            System.out.println("Dentro de B");
            break A;
        }
    }
        C: while (true){
            System.out.println("Dentro de C");
            D: while (true){
                System.out.println("Dentro de D");
                continue C;
            }
        }
    }
}
