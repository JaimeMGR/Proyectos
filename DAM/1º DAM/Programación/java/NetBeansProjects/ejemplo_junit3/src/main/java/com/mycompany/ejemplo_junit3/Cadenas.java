/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit3;

/**
 *
 * @author Profesor
 */
public class Cadenas {
    String invertir(String cadena)
    {
        String resultado = "";
        for(int i=cadena.length()-1;i>=0;i--)
        {
            resultado = resultado + cadena.charAt(i);
        }
            
        return resultado.toUpperCase();
    }
    
    String suma(String cadena)
    {
        int acumulado = 0;
        String resultado = "";
        
        for(int i=0; i<cadena.length();i++)
        {
            acumulado = cadena.charAt(i) + 1;
            resultado = resultado + (char) acumulado;
            
            //resultado = resultado + (char) (cadena.charAt(i) + 1);
        }
            
        return resultado;
    }
    
}
