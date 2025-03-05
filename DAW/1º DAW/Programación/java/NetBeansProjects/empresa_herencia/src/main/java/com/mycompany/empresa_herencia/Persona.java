/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.empresa_herencia;

/**
 *
 * @author Profesor
 */
public class Persona {
    private String nombre;
    private String apellidos;
    private String nif;
    private String ciudad;

    public String getNombre() {
        return nombre;
    }

    public String getApellidos() {
        return apellidos;
    }

    public String getNif() {
        return nif;
    }

    public String getCiudad() {
        return ciudad;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
    }

    public void setCiudad(String ciudad) {
        this.ciudad = ciudad;
    }

    
    
    public Persona(String nombre, String apellidos, String nif, String ciudad) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.nif = nif;
        this.ciudad = ciudad;
    }

    public Persona(String nombre, String apellidos, String nif) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.nif = nif;
        this.ciudad = "Desconocido";
    }

    @Override
    public String toString() {
        return nombre + " " + apellidos + "\n"
        + nif + "\n" 
        + ciudad;
    }
    
    
    
}
