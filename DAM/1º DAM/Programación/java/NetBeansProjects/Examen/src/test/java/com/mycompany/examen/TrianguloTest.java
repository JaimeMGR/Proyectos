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
public class TrianguloTest {
    @Test
    public void testCalculaArea() {
        System.out.println("calculaArea");
        Triangulo tri = new Triangulo(5, 3);
        double expResult = 7.5;
        double result = tri.calculaArea();
        assertEquals(expResult, result, 0);
    }
}
