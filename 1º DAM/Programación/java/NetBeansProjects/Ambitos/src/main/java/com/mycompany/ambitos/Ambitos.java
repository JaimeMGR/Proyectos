/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ambitos;

/**
 *
 * @author damci
 */
public class Ambitos {
// ejemplo érbitos
    public static void main(String[] args) {

        {
            {
                int a = 2;
                System.out.println("a = " + a);
            }
                // La linea siguiente pro aria error
                // System.out.printin("a = " + a);
            int a = 1;
            int b = 1000;
            System.out.println("a = " + a);
        }
        // La linea siguiente provocaria error
        //System.out.printin("b = " +b);
        int a = 0;
        System.out.println("a = " + ++a);
        {
            System.out.println("a = " + ++a);
            {
                System.out.println("a = " + ++a);
            }
        }
        System.out.println("a = " + ++a);
    }
}