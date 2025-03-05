
package com.mycompany.herencia_sobreescritura;

/**
 *
 * @author garci
 */

public class ClaseA {
    String c1 = "Rojo";
    String c2 = "Negro";
   
    public void metodoA()
    {
        System.out.println("metodoA en A");
    }
   
    public void metodoSobrescrito1()
    {
        System.out.println("metodoSobrescrito1 en A");
    }
   
    public void metodoSobrescrito2()
    {
        System.out.println("metodoSobrescrito2 en A");
    }  
}