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
public class CuadradoTest {
    
    public CuadradoTest() {
    }

//Creamos un test para probar el área del cuadrado
    @Test
    public void testCalculaArea() {
        System.out.println("calculaArea");
        Cuadrado cuadrado = new Cuadrado(4);
        double expResult = 16;
        double result = cuadrado.calculaArea();
        assertEquals(expResult, result, 0);

    }
}