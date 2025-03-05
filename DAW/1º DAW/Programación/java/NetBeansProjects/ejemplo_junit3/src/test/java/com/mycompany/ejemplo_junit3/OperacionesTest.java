/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit4TestClass.java to edit this template
 */
package com.mycompany.ejemplo_junit3;

import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Profesor
 */
public class OperacionesTest {   
    public OperacionesTest() {
    }

    /**
     * Test of sumaArray method, of class Operaciones.
     */
    @Test
    public void testSumaArray() {
        System.out.println("sumaArray");
        //Given
        Operaciones instance = new Operaciones();
        //When
        int[] array = {2, 5, 7, 4, 1};
        int expResult = 19;
        int result = instance.sumaArray(array);
        //Then
        assertEquals(expResult, result);
    }
    
    @Test
    public void testMayorElementoArray() {
        System.out.println("mayorElementoArray");
        //Given
        Operaciones instance = new Operaciones();
        //When
        int[] array = {2, 5, 7, 4, 1};
        int expResult = 7;
        int result = instance.mayorElementoArray(array);
        //Then
        assertEquals(expResult, result);
    }
    
    @Test
    public void testMenorElementoArray() {
        System.out.println("menorElementoArray");
        //Given
        Operaciones instance = new Operaciones();
        //When
        int[] array = {2, 5, 7, 4, 1};
        int expResult = 1;
        int result = instance.menorElementoArray(array);
        //Then
        assertEquals(expResult, result);
    }
    
    @Test
    public void testMayorMenorElementoArray() {
        System.out.println("mayorMenorElementoArray");
        //Given
        Operaciones instance = new Operaciones();
        int[] array = {2, 5, 7, 4, 1};
        //When
        int tipo = Operaciones.MAYOR;
        int expResult = 7;
        int result = instance.mayorMenorElementoArray(array, tipo);
        //Then
        assertEquals(expResult, result);
        
        //When
        tipo = Operaciones.MENOR;
        expResult = 1;
        result = instance.mayorMenorElementoArray(array, tipo);
        //Then
        assertEquals(expResult, result);
    }
    
    @Test
    public void testInvertir() {
        System.out.println("Invertir cadenas");
        //Given
        Cadenas instance = new Cadenas();
        //When
        String cadena = "Hola";
        String expResult = "ALOH";
        String result = instance.invertir(cadena);
        //Then
        assertEquals(expResult, result);
    }
    
    @Test
    public void testSuma() {
        System.out.println("suma cadenas");
        //Given
        Cadenas instance = new Cadenas();
        //When
        String cadena = "HAL";
        String expResult = "IBM";
        String result = instance.suma(cadena);
        //Then
        assertEquals(expResult, result);
    }
    
    @Test		
    public void testAssert(){					
        		
        //Variable declaration		
        String string1="Junit";					
        String string2="Junit";					
        String string3="test";					
        String string4="test";					
        String string5=null;					
        int variable1=1;					
        int	variable2=2;					
        int[] airethematicArrary1 = { 1, 2, 3 };					
        int[] airethematicArrary2 = { 1, 2, 3 };					
        		
        //Assert statements		
        assertEquals(string1,string2);					
        assertSame(string3, string4);					
        assertNotSame(string1, string3);					
        assertNotNull(string1);			
        assertNull(string5);			
        assertTrue(variable1<variable2);					
        assertArrayEquals(airethematicArrary1, airethematicArrary2);
        
        Persona p1 = new Persona("Ana", 20);
        Persona p2 = new Persona("Luis", 21);
        assertNotSame(p1, p2);
        p2 = p1;
        assertSame(p1, p2);
        assertEquals(p1,p2);	
    }
    
    
    
}
