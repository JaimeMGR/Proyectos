/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit4TestClass.java to edit this template
 */
package com.mycompany.figura;

import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author damci
 */
public class TrianguloTest {
    
    public TrianguloTest() {
    }
//Creamos un test para probar el área del triángulo
    @Test
    public void testCalculaArea() {
        System.out.println("calculaArea");
        Triangulo triangulo = new Triangulo(5, 3);
        double expResult = 7.5;
        double result = triangulo.calculaArea();
        assertEquals(expResult, result, 0);

    }
}