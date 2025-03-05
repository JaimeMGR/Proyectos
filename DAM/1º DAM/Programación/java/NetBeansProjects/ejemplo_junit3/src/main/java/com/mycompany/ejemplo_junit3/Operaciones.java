/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit3;

/**
 *
 * @author Profesor
 */
public class Operaciones {
    static final int MENOR = 0;
    static final int MAYOR = 1;
    int sumaArray(int[] array)
    {
        int suma = 0;
        for (int i=0;i<array.length;i++)
        {
            suma = suma + array[i];
        }
        
        return suma;
    }
    
    
    int menorElementoArray(int[] array)
    {
        int menor = -1;
        if (array.length > 0) 
               menor = array[0];
        
        for (int i=0;i<array.length;i++)
        {
            if (menor > array[i]) 
                menor = array[i];
        }
        
        return menor;
    }
    
    int mayorElementoArray(int[] array)
    {
        int mayor = -1;
        if (array.length > 0) 
               mayor = array[0];
        
        for (int i=0;i<array.length;i++)
        {
            if (mayor < array[i]) 
                mayor = array[i];
        }
        
        return mayor;
    }
    
    int mayorMenorElementoArray(int[] array, int tipo)
    {      
        if (tipo == Operaciones.MENOR)
            return menorElementoArray(array);
        else return mayorElementoArray(array);
    }
}
