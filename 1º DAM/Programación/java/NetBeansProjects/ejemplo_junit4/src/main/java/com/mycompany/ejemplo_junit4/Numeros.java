/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit4;

/**
 *
 * @author damci
 */
public class Numeros {
    public int suma(int a, int b)
    {
        if (a<0 || b<0) throw new IllegalArgumentException("No se aceptan valores negativos");
        return a+ b;
    }
    
        public String mayorDeEdad(int edad) {
        if (edad >= 18) {
            return "Es mayor de edad";
        } else {
            return "Es menor de edad";
        }
    }
}
