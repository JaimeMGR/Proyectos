/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.examencoleccionesclases;

import java.util.ArrayList;

/**
 *
 * @author Profesor
 */
public class ListaPersonas {
    ArrayList<Persona> lista = new ArrayList<>();
    
    void añadirPersona(Persona p)
    {
        lista.add(p);
    }
    
    void listar()
    {
        for (Persona p:lista) {
            System.out.println(p.getNombre() + p.getApellido1());
            }
    }
    
    String buscar (String nif) {
        for (Persona p:lista) {
            if (p.getNif().equals(nif))
                return p.getNombre() + " " +  p.getApellido1();
            }
        return "-1";
    }
    
//    String buscar(String nif) {
//        lista.forEach((p) -> {
//            if (p.getNif() == nif)
//                return p.getNombre() + " " +  p.getApellido1();
//            }
//        );
//        
//        return "-1";
//        
//    }
}
