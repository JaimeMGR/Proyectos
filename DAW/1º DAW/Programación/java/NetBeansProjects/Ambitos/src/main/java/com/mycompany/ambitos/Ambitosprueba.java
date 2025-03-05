/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ambitos;

/**
 *
 * @author damci
 */
public class Ambitosprueba {

    static int a = 99;
    
    static final int MAXIMO_VALOR = 100;
    static final boolean CET_OCULTA = false;
    
    public static void main(String[] args) {
        {
            final int CTE = 100;
            System.out.println("Valor cte: " + MAXIMO_VALOR);
            {
                int a = 2;
                System.out.println("a = " + (a + MAXIMO_VALOR));
                        
                        
            }
            System.out.println(CTE);
            int a = 1;
            int b = 1000;
            System.out.println("a = " + a);
        }

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
    
    public void prueba()
    {
        int a = 10;
        this.a = 111;

        System.out.println("a = " +a);
        System.out.println("a = " + this.a);
    }
}