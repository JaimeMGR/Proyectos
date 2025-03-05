/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
 */
package com.mycompany.examen;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

/**
 *
 * @author jaime
 */
public class CuadradoTest {
    @Test
    public void testCalculaArea() {
        System.out.println("calculaArea");
        Cuadrado cua = new Cuadrado(4);
        double expResult = 16;
        double result = cua.calculaArea();
        assertEquals(16, result, 0);
    }
    
}
