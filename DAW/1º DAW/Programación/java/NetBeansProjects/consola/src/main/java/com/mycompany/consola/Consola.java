/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.consola;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author damci
 */
public class Consola {

    public static void main(String[] args) {
        int c1, c2, c3;
        System.out.println("Introduzca 3 carácteres");
        try
        {
            c1 = System.in.read();
            c2 = System.in.read();
            c3 = System.in.read();
            System.out.write(c1);
            System.out.print((char)c2);
            System.out.println((char)c3);
        } 
            catch (IOException ex)  {
                Logger.getLogger(Consola.class.getName()).log(Level.SEVERE, null, ex);
        }

        
    }
}
