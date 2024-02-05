/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.examencoleccionesclases;

/**
 *
 * @author Profesor
 */
public class Persona {
     private String nif;
    private String nombre;
    private String apellido1;
    private String apellido2;
    private int edad;
    private boolean casado;
    
    //Constructores
    public Persona(String nombre, String apellido1, String nif)
    {
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.nif = nif;
    }

    public Persona(String nif, String nombre, String apellido1, String apellido2, int edad, boolean casado) {
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.edad = edad;
        this.casado = casado;
    }

    
    
    
    
    //getters y setters
    public String getNif()
    {
        return this.nif;
    }
    
    public void setNif(String nif)
    {
        this.nif = nif;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre.toUpperCase();
    }

    public String getApellido1() {
        return apellido1;
    }

    public void setApellido1(String apellido1) {
        this.apellido1 = apellido1;
    }

    public String getApellido2() {
        return apellido2;
    }

    public void setApellido2(String apellido2) {
        this.apellido2 = apellido2;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public boolean isCasado() {
        return casado;
    }

    public void setCasado(boolean casado) {
        this.casado = casado;
    }
    
    
    
    public String saludar()
    {
        String resultado = "Hola soy " + this.nombre;
        
        return resultado;
    }  
}
