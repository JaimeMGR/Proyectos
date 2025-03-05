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
public class CadenasTest {
    
    public CadenasTest() {
    }

    /**
     * Test of ofuscar method, of class Cadenas.
     */
    @Test

    public void testOfuscar() {

        System.out.println("ofuscar");

        //Given

        Cadenas instance = new Cadenas();

        //When

        String cadena = "hola";

        String expResult = "hola";

        String result = instance.ofuscar(cadena);

        //Then

        assertNotEquals(expResult, result);

    }

    /**
     * Test of conE method, of class Cadenas.
     */
    @Test
    public void testConE() {
        System.out.println("conE");
        String cadena = "patata";
        Cadenas instance = new Cadenas();
        String expResult = "petete";
        String result = instance.conE(cadena);
        assertEquals(expResult, result);

    }
    
    @Test(expected=ArrayIndexOutOfBoundsException.class)

    public void testInvertirParte() {

        System.out.println("conE");

        Cadenas instance = new Cadenas();

        //When

        String[] cadena = {"piña", "pera", "plátano", "kiwi"};

        String[] expResult = {"piña", "kiwi", "plátano", "pera"};

        String[] result = {"piña", "kiwi", "plátano", "pera"};

        //Then

        assertArrayEquals(expResult, result);

        

        //When

        String[] cadena2 = {"piña", "pera", "plátano", "kiwi", "melón"};

        instance.invertirParte(cadena2);
    }
    
    
    
    }