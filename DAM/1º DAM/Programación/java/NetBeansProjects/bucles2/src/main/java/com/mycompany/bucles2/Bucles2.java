/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.bucles2;

/**
 *
 * @author damci
 */
public class Bucles2 {

    public static void main(String[] args) {
        int i = 0;
        while(i<20){
        i=i+1;
        if (i ==3 || i ==7) continue;
        System.out.println(i + " al cuadrado es igual a : "+ i*i);
    }
}
}
