/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.alumno;

/**
 *
 * @author jaime
 * @version 1.0
 * @see 
 * @since 05/12/2022
 * 
 * 
 */
public class Alumno {

    private String nombre;

    private String apellidos;

    private float programacion;

    private float lenguajeMarcas;

    private float sistemasInformaticos;

    private float notaMedia;


     public Alumno(String nombre, String apellidos) {

        this.nombre = nombre;

        this.apellidos = apellidos;

    }



   public Alumno(String nombre, String apellidos, float programacion, float lenguajeMarcas, float sistemasInformaticos) {

        this.nombre = nombre;

        this.apellidos = apellidos;

        this.programacion = programacion;

        this.lenguajeMarcas = lenguajeMarcas;

        this.sistemasInformaticos = sistemasInformaticos;

    }



    

    

    public String getNombre() {

        return nombre;

    }



    public void setNombre(String nombre) {

        this.nombre = nombre;

    }



    public String getApellidos() {

        return apellidos;

    }



    public void setApellidos(String apellidos) {

        this.apellidos = apellidos;

    }



    public float getProgramacion() {

        return programacion;

    }



    public void setProgramacion(float programacion) {

        this.programacion = programacion;

    }



    public float getLenguajeMarcas() {

        return lenguajeMarcas;

    }



    public void setLenguajeMarcas(float lenguajeMarcas) {

        this.lenguajeMarcas = lenguajeMarcas;

    }



    public float getSistemasInformaticos() {

        return sistemasInformaticos;

    }



   public void setSistemasInformaticos(float sistemasInformaticos) {

        this.sistemasInformaticos = sistemasInformaticos;

    }



    public float getNotaMedia() {

        return notaMedia;

    }



    private void setNotaMedia(float notaMedia) {

        this.notaMedia = notaMedia;

    }

    

   public void calcularMedia()

    {

        this.notaMedia = (this.programacion 

                + this.lenguajeMarcas 

                + this.sistemasInformaticos)/3;

    }

    

    public String consultarAlumno()

    {

        return "El alumno " + this.nombre + " " + this.apellidos 

                + " tiene una nota media de " + this.notaMedia;

    }
}