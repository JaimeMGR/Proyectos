/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.cine;

/**
 *
 * @author damci
 */
public class Peliculas {
    private String titulo;
    private String director;
    private String genero;
    private String año;
    boolean toString;

    public Peliculas(String titulo, String genero, String cf, int par) {
        this.titulo=titulo;
        this.genero=genero;
    }
    
    public Peliculas() {
        this.titulo="Desconocido";
        this.genero=""; 
        this.director="Homer";
        this.año="2008";
    }
    public String getTitulo() {
        return titulo;
    }

    public String getDirector() {
        return director;
    }

    public String getGenero() {
        return genero;
    }

    public String getAño() {
        return año;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public void setDirector(String Director) {
        this.director = director;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public void setAño(String año) {
        this.año = año;
    }
    
    
    
}
