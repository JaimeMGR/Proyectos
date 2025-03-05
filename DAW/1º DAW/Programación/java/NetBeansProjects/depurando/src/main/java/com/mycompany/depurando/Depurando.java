/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.depurando;

/**
 *
 * @author damci
 */
public class Depurando {

    public static void main(String[] args) {
        int resultado = 0;
        for(int i=0;i<100;i = i +2)
        {
            for(int j=50;j>1;j = j - 3)
            {
                int k=1;
                while (k<=40)
                {
                    k++;
                    resultado = i * j * k;
                }
            }
        }
    }
}
