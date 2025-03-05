/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit2;

/**
 *
 * @author Profesor
 */
public class Operaciones {
    int suma(int a, int b)
    {
        return a+b;
    }
    
    /**
     * Según sistema, retorna la conversión a grados Celsius ('C') 
     * o Farenheit ('F')
     * @param temperatura
     * @param sistema
     * @return temperatura en Celsius o Farenheit
     */
    double conversor(double temperatura, char sistema)
    {
        if (sistema == 'F')
            return (temperatura -32)*(5.0/9.0);
        else return (temperatura * (9.0/5.0)) + 32;
    }
    
    double fahrenheitToCelsius(double farenheit)
    {
        return (farenheit -32)*(5.0/9.0);
    }
    
    double celsiusToFahrenheit(double celsius)
    {
        return (celsius * (9.0/5.0)) + 32;
    }
}
