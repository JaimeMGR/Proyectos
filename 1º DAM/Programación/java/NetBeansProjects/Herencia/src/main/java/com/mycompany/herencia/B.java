/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.herencia;

/**
 *
 * @author damci
 */
public class B extends A{
        public B()
    {
        System.out.println("En constructor B");
    }
    
    public B(String mensaje)
    {
        super(mensaje);
        System.out.println("B: " + mensaje);
    }
    public B(int numero)
    {
        super(numero);
        System.out.println("B: " + numero);
    }
}
