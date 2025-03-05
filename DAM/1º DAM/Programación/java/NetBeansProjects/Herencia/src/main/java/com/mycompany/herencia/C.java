/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.herencia;

/**
 *
 * @author damci
 */
public class C extends B {
        public C()
    {
        System.out.println("En constructor C");
    }
    
    public C(String mensaje)
    {
        super(mensaje);
        System.out.println("C: " + mensaje);
    }
    public C(int numero)
    {
        super(numero);
        System.out.println("C: " + numero);
    }
}
