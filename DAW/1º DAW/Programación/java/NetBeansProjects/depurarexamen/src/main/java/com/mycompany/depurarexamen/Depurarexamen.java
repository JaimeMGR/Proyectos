/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.depurarexamen;

/**
 *
 * @author damci
 */
public class Depurarexamen {

//Depurar el siguiente código y dar el valor de resultado, cuando se dan las siguientes condiciones:
//
//i=10, j=20, k=2
//
//
//
//Código:





    public static void main(String[] args) {

        

        for(int i=0;i<100;i = i +2)

        {

            for(int j=50;j>1;j = j - 3)

            {

                int k=1;

                int l = 6;

                while (k<=20)

                {

                    k++;

                    l = l*k;

                    calculando(i, j, l);

                }

                    

            }

        }

        

            

    }

    

    public static void calculando(int i, int j, int l)

    {

        int resultado = i * j * (l - 3) /10 ;

        

    }

}