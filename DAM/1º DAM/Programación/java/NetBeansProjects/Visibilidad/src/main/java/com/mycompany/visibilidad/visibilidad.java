/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package com.mycompany.visibilidad;

/**
 *
 * @author damci
 */
public class visibilidad {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Persona p = new Persona();
        p.nombre = "Juan";
        p.nif = "1234";
        
        int valor = 9;
        String c = "Hola";
        
        prueba(valor);
        prueba(c);
        prueba(p);
        
        System.out.println(valor);
        System.out.println(p.nombre);
        System.out.println(p);
    }
    
    static void prueba (Integer num)
    { 
        num = 14;
    }
    
    static void prueba (String cad)
    {
        cad = "adios";
    }
    static void prueba (Persona par)
    {
        par.nombre = "Pedro";
        par.nif = "22222";
    }
}
