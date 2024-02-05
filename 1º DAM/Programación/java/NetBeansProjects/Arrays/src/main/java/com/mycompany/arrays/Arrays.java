/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.arrays;
import java.util.*;
import java.util.Arrays;
import java.util.Random;

/**
 *
 * @author Profesor
 */
public class Arrays {

    public static int[] numerosAleatorios(int dimension)
    {
        int[] array = new int[dimension];
        Random random = new Random();
        
        for(int i=0; i<array.length;i++)
        {
            array[i] = (int)(Math.random()*100+1);
            //array[i] = random.nextInt(101);
        }
        
        return array;
    }
    
    public static void proceso (int n, int[] numeros, Persona p)
    {
        n = 9;

        for(int i=0;i<numeros.length;i++)
        {
            numeros[i] = numeros[i]*2;
        }
        
        p.edad = 99;
    }
    
        
    /**
     * 
     * @param texto
     * @return Número de palabras de texto, mayúsculas y minúsculas
     */
    static int contarPalabras(String texto)
    {
        String[] resultado = texto.split(" ");
        System.out.println("Resultado de split: " + Arrays.toString(resultado));
        return resultado.length;
    }
    
    public static void main(String[] args) {
        int[] numeros = numerosAleatorios(100);
        for (int elemento:numeros)
        {
            System.out.println(elemento);
        }
        
        Arrays.sort(numeros);
        System.out.println(Arrays.toString(numeros));
        
        //Parámetros
        int b = 10;
        int[] datos = {2, 9, 1};
        Persona pepe = new Persona("Pepe", 22);
        
        proceso(b, datos, pepe);
        System.out.println("Valor de b: " + b);
        System.out.println("Valor de datos: " 
                + Arrays.toString(datos));
        Arrays.sort(datos);
        System.out.println("Valor de datos: " 
        + Arrays.toString(datos));
        System.out.println("Edad de pepe: " 
        + pepe.edad);
        
        //Inversión de array
        String[] frutas = {"piña", "pera", "plátano", "kiwi"};
        String[] frutas2 = new String[frutas.length];
        frutas2[0] = frutas[0];
        int j=1;
        for(int i=frutas.length-1;i>0;i--)
        {
            frutas2[j]=frutas[i];
            j++;
        }
        
        System.out.println(Arrays.toString(frutas2));
        
        contarPalabras("hola hoy es jueves");
    }

    
    
   
}
