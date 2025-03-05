/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejerciciostema6.viajero.persona;

import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Viajero {


    private String dni;
    private String nombre;
    private String apellidos;
    private String nacionalidad;
    private String direccion;
    public static int nInstancias;

    
    public Viajero(String dni, String nombre, String apellidos, String nacionalidad, String direccion) {
        this.dni = dni;
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.nacionalidad = nacionalidad;
        this.direccion = direccion;
        nInstancias++;
    }

        public enum Formato {
        pausado, normal
        }

        public Viajero() {
        this.dni = "Sin papeles";
        this.nombre = "Juancho";
        this.apellidos = "Zafarrancho";
        this.nacionalidad = "Española";
        this.direccion = "Caja cartones";
        nInstancias++;
        }
    
    public String getDni() {
        return dni;
    }
    
    public String getNombre() {
        return nombre;
    }
    
    public String getApellidos() {
        return apellidos;
    }
    
    public String getNacionalidad() {
        return nacionalidad;
    }
    
    public String getDireccion() {
        return direccion;
    }
    
    public void setDni(String dni) {
        this.dni = dni;
    }
    
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    
    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
    }
    
    public void setNacionalidad(String nacionalidad) {
        this.nacionalidad = nacionalidad;
    }
    
    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public void mostrarLinea(String valor, String formato, Scanner sc)
    {
        System.out.println(valor);
        if (formato.equals("pausado"))
            sc.nextLine();
    }
    
    public void getInfo(String formato)
    {
        Scanner sc = new Scanner(System.in);
        mostrarLinea(this.nombre, formato, sc);
        mostrarLinea(this.apellidos, formato, sc);
        mostrarLinea(this.dni, formato, sc);
        mostrarLinea(this.nacionalidad, formato, sc);
        mostrarLinea(this.direccion, formato, sc);
    }
    }
