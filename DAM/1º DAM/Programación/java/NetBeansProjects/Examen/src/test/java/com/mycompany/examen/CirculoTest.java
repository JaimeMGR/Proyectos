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
public class CirculoTest {
    @Test
    public void testCalculaArea() {
        System.out.println("calculaArea");
        Circulo cir = new Circulo(10);
        double expResult = 314.16;
        double result = cir.calculaArea();
        assertEquals(expResult, result, 0);
    }
    
}
