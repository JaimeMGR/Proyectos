/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit4TestClass.java to edit this template
 */
package com.mycompany.ejemplo_junit2;

import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Profesor
 */
public class OperacionesTest {
    

    @Test
    public void testSuma() {
        //Given
        Operaciones op = new Operaciones();
        
        //When
        int a = 4;
        int b = 2;
        
        int resultado = op.suma(a, b);
        
        //Then
        assertEquals(6, resultado);
    }
    
    @Test
    public void testFarenheit() {
        //Given
        Operaciones op = new Operaciones();
        
        //When
        double a = 176d;       
        double resultado = op.conversor(a, 'F');
        
        //Then
        assertEquals(80.0, resultado, 0);
    }
    
    @Test
    public void testCelsius() {
        //Given
        Operaciones op = new Operaciones();
        
        //When
        double a = 100d;       
        double resultado = op.conversor(a, 'C');
        
        //Then
        assertEquals(212.0, resultado, 0);
    }

    /**
     * Test of fahrenheitToCelsius method, of class Operaciones.
     */
    @Test
    public void testFahrenheitToCelsius() {
        //Given
        System.out.println("fahrenheitToCelsius");
        Operaciones instance = new Operaciones();
        //When
        double farenheit = -5;
        double expResult = -20.55;
        double result = instance.fahrenheitToCelsius(farenheit);
        //Then
        assertEquals(expResult, result, .01);
        
        //When
        farenheit = 0;
        expResult = -17.78;
        result = instance.fahrenheitToCelsius(farenheit);
        //Then
        assertEquals(expResult, result, .01);
        
        //When
        farenheit = 15;
        expResult = -9.44;
        result = instance.fahrenheitToCelsius(farenheit);
        //Then
        assertEquals(expResult, result, .01);
        
        //When
        farenheit = 32;
        expResult = 0;
        result = instance.fahrenheitToCelsius(farenheit);
        //Then
        assertEquals(expResult, result, .01);
    }

    /**
     * Test of celsiusToFahrenheit method, of class Operaciones.
     */
    @Test
    public void testCelsiusToFahrenheit() {
        System.out.println("celsiusToFahrenheit");
        double celsius = -5;
        Operaciones instance = new Operaciones();
        double expResult = 23;
        double result = instance.celsiusToFahrenheit(celsius);
        assertEquals(expResult, result, .01);
    }
    
    @Test
    public void testDolaresAEuros() {
        //Given
        System.out.println("Dolares A Euros");
        ConversorMonedas instance = new ConversorMonedas();
        //When
        double dolares = 10.5;
        double expResult = 9.76;
        double result = instance.dolaresAEuros(dolares);
        //Then
        assertEquals(expResult, result, .01);
    }
    
}
