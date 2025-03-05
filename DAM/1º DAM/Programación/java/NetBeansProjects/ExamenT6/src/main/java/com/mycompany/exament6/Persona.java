/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament6;

/**
 *
 * @author damci
 */
public class Persona {
    private String nombre;
    private String apellidos;
    private String nif;

    
    //Generamos un constructor de personas con sus datos
    public Persona(String nombre, String apellidos, String nif) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.nif = nif;
    }

    public String getNombre() {
        return nombre;
    }

    public String getApellidos() {
        return apellidos;
    }

    public String getNif() {
        return nif;
    }

    //Con el toString mostramos la información en la pantalla usando los datos
    
    public String toString() {
        return "La persona llamada " + nombre + " " +  apellidos + ", tiene como nif el siguiente: " + nif;
    }
    
}
