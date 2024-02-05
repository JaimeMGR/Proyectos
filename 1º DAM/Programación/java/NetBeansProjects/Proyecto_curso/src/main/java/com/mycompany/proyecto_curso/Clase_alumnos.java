/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.proyecto_curso;

/**
 *
 * @author damci
 */
public class Clase_alumnos {
    private String Nombre;
    private String Apellidos;
    private float Nota_Media;
    
    private static int NAlumnos = 0;
    private static float Media_Total = 0;

    public Clase_alumnos(String Nombre, String Apellidos, float Nota_Media) {
    this.Nombre = Nombre;
    this.Apellidos = Apellidos;
    this.Nota_Media = Nota_Media;
    NAlumnos++;
    Media_Total = Media_Total + Nota_Media;
    
 
}

    @Override
    public String toString() {
        return "Clase_alumnos{" + "Nombre=" + Nombre + ", Apellidos=" + Apellidos + ", Nota_Media=" + Nota_Media + '}';
    }

    public static int getNAlumnos() {
        return NAlumnos;
    }

    public static float getMedia_Total() {
        return Media_Total;
    }

    public String getNombre() {
        return Nombre;
    }

    public void setNombre(String Nombre) {
        this.Nombre = Nombre;
    }

    public String getApellidos() {
        return Apellidos;
    }

    public void setApellidos(String Apellidos) {
        this.Apellidos = Apellidos;
    }

    public float getNota_Media() {
        return Nota_Media;
    }

    public void setNota_Media(float Nota_Media) {
        this.Nota_Media = Nota_Media;
    }
}
