/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit4TestClass.java to edit this template
 */
package com.mycompany.ejemplo_junit;

import org.junit.AfterClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Profesor
 */
public class Ejemplo_junitTest {
    
    public Ejemplo_junitTest() {
    }
    
    @AfterClass
    public static void tearDownClass() {
    }

    /**
     * Test of main method, of class Ejemplo_junit.
     */
    @Test
    public void testMain() {
        System.out.println("main");
        String[] args = null;
        Ejemplo_junit.main(args);
    }
    
}
