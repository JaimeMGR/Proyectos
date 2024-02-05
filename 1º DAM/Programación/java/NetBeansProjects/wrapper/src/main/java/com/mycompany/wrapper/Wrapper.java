/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.wrapper;

/**
 *
 * @author damci
 */
public class Wrapper {

    public static void main(String[] args) {
        Integer i = 8;
        
        Float f = 5.0f;
        
        String s = "9";
        int n = 9;
        
        Integer convertido = 0;
        
        System.out.println(Integer.parseInt("10"));
        System.out.println(f.intValue());
        System.out.println(Integer.valueOf(n));
        
        convertido = n;
        convertido = Integer.valueOf(s);
        System.out.println(convertido);
        System.out.println((n>10)?"Es mayor de 10":"Es menor de 10");
        
        int a = 8;
        int b = a++;
        System.out.println(b);
        System.out.println("valor final de a: " + a);
    }
}
