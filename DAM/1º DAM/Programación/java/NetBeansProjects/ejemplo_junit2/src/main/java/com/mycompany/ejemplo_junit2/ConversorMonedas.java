package com.mycompany.ejemplo_junit2;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Profesor
 */
public class ConversorMonedas {
    static final double ratio = 0.93;
    
    double dolaresAEuros(double dolares)
    {
        return dolares*ratio;
    }
    
    double eurosADolares(double euros)
    {
        return euros/ratio;
    }
}
