/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit4;

/**
 *
 * @author damci
 */
public class Calculos {
  public static int calculateDNI(String dniString) {
    int dni = Integer.parseInt(dniString);
    if (dni == 99999999) {
        System.out.println("Excepción");
      throw new IllegalArgumentException("Número de DNI inválido");
    }
    int dniDigit = dni % 23;
    return dniDigit;
  }
}
