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
public class CirculoTest {
    
    public CirculoTest() {
    }
    //Creamos un test para probar el área del circulo
    @Test
    public void testCalculaArea() {
        System.out.println("calculaArea");
        Circulo circulo = new Circulo(10); 
        double expResult = 314.16;
        double result = circulo.calculaArea();
        assertEquals(expResult, result, 0);

    }

}
