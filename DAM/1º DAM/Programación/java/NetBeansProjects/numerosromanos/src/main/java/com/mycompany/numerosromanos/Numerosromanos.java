/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.numerosromanos;

/**
 *
 * @author damci
 */
public class Numerosromanos {
    int valorDecimal(char c)
    {
        return switch (c)
        {
            case 'I' -> 1;
            case 'V' -> 5;
            case 'X' -> 10;
            case 'L' -> 50;
            case 'C' -> 100;
            case 'D' -> 500;
            case 'M' -> 1000;
            default -> 0;
        };
    }
    int romanoAdecimal(String numero)
    {
        for(int i=0;i<numero.length();i++);
        {
            System.out.println(numero.charAt(i));
        }
        
        return 0;
    }
}
