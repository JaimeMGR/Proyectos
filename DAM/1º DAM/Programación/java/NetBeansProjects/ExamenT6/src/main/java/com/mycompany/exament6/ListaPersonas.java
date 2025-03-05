/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament6;
import java.util.ArrayList;
import java.util.HashMap;

/**
 *
 * @author Jaime Molina Granados
 */


public class ListaPersonas {
    private ArrayList<Persona> ArrayPersonas; //Creamos el ArrayList
    
    public ListaPersonas() {
        ArrayPersonas = new ArrayList<Persona>();
    }
    
    public void añadirPersona(Persona persona) {//Con este comando podemos añadir personas
        ArrayPersonas.add(persona);
    }

    public void listar() { //Con esta función podemos listar los objetos de la Arraylist(ArrayPersonas)
        for (Persona persona : ArrayPersonas) {
            System.out.println(persona);
        }
    }

    public Persona buscarPersona(String nif) { //Con este comando buscamos que alguna de las personas tenga el valor nif igual que 
        for (Persona persona : ArrayPersonas) { //el que estamos buscando, si no lo encuentra te lo dirá, si lo encuentra
            if (persona.getNif().equals(nif)) { //te enseñará la información de la persona
                System.out.println("-----------------------");
                return persona;
            }
        }
        System.out.println("-----------------------");
        System.out.println("Ese nif no existe");
        return null;
    
    }
}
