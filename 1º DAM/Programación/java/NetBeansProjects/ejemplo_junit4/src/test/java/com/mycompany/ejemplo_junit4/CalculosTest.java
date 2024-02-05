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
public class CalculosTest {
    

    /**
     * Test of calculateDNI method, of class Calculos.
     */
  @Test
  public void testCalculateDNI_validDNI1() {
    String dniString = "11778777";
    int expectedDniDigit = 17;
    int actualDniDigit = Calculos.calculateDNI(dniString);
    assertEquals(expectedDniDigit, actualDniDigit);
  }
  public void testCalculateDNI_validDNI2() {
    String dniString = "12345678";
    int expectedDniDigit2 = 14;
    int actualDniDigit3 = Calculos.calculateDNI(dniString);
    assertEquals(expectedDniDigit2, actualDniDigit3);
  }
  public void testCalculateDNI_validDNI3() {
    String dniString = "78108311";
    int expectedDniDigit3 = 12;
    int actualDniDigit3 = Calculos.calculateDNI(dniString);
    assertEquals(expectedDniDigit3, actualDniDigit3);
  }
  

  
  @Test
  public void testCalculateDNI_invalidDNI() {
    String dniString = "99999999";
    assertThrows(IllegalArgumentException.class, () -> {
      Calculos.calculateDNI(dniString);
    });
  }
    
}
