    /*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit4TestClass.java to edit this template
 */
package com.mycompany.ejemplo_junit;

import static com.sun.source.util.DocTrees.instance;
import static com.sun.source.util.JavacTask.instance;
import static com.sun.source.util.Trees.instance;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Test;
import static org.junit.Assert.*;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Rule;
import org.junit.rules.ExpectedException;

/**
 *
 * @author Profesor
 */
public class Test1Test {
    @BeforeClass
    public static void setUpClass()
    {
        System.out.println("setUpClass");
    }
    
    @AfterClass
    public static void tearDownClass()
    {
        System.out.println("tearDownClass");
    }
    
    @Before
    public void setUp()
    {
        System.out.println("setUp");
    }
    
    @After
    public void tearDown()
    {
        System.out.println("tearDown");
    }
    
    @org.junit.Test
    public void testMultiplica() {
    System.out.println("multiplica");
    int a = 2;
    int b = 2;

    Test1 instance = new Test1();
    int expResult = 4;
    int result = instance.multiplica(a, b);
    assertEquals (expResult, result);
    }
    
    @org.junit.Test
    public void testFactorial() {
        System.out.println("factorial");
        int numero = 3;
        Test1 instance = new Test1();
        int expResult = 6;
        int result = instance.factorial (numero) ;
        assertEquals (expResult, result);
    }
    
    @Rule
    public ExpectedException exception = ExpectedException.none();
            
    //@org.junit.Test
    public void testFactorialNegativo() {
        System.out.println("Factorial negativo");
        //Given
        int numero = -3;
        Test1 instance = new Test1();
        //When
        //exception.expect(ArithmeticException.class);
        exception.expectMessage("El factorial negativo no existe");
        //Then
        int result = instance.factorial (numero) ;
    }
    
    @Test(expected=IllegalArgumentException.class)
    public void testSumar()
    {
        System.out.println("sumar");
        //Given
        Test1 instance = new Test1();
        int a = 9, b = 3;
        //When
        int resultado = instance.sumar(a, b);
        //Then
        assertEquals (12, resultado,0);
        
        //Probar excepción
        a = -9;
        b = 3;
        //When
        instance.sumar(a, b);
        
    }
    /**
     * Test of Dividir method, of class Test1.
     */
    @Test
    public void testDividir() {
        System.out.println("Dividir");
        //Given
        Test1 Dividir = new Test1();
        int a = 8, b = 2;
        //When
        float expResult = 4;
        int resultado = Dividir.Dividir(a, b);
        //Then
        assertEquals (expResult, resultado,0);
        
        //Probar excepción
        a = -9;
        b = 3;
        //When
        Dividir.Dividir(a, b);
        
    }
    
    
    
}
