/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit4TestClass.java to edit this template
 */
package com.mycompany.ejemplo_junit4;

import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author damci
 */
public class NumerosTest {
    
    public NumerosTest() {
    }

    /**
     * Test of suma method, of class Numeros.
     */
    @Test
    public void testSuma() {
        System.out.println("suma");
        int a = 0;
        int b = 0;
        Numeros instance = new Numeros();
        int expResult = 0;
        int result = instance.suma(a, b);
        assertEquals(expResult, result);

    }

    /**
     * Test of mayorDeEdad method, of class Numeros.
     */
    @Test
    public void testMayorDeEdad() {
        System.out.println("mayorDeEdad");
        int edad = 9;
        Numeros instance = new Numeros();
        String expResult = "Es menor de edad";
        String result = instance.mayorDeEdad(edad);
        assertEquals(expResult, result);

    }
    
}
