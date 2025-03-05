/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.abstracto;

/**
 *
 * @author damci
 */
public class Gato extends Animal{
    private int patas;
    private String cola;
    private int numeroRegistro;
    
    @Override
    public void comunicarse() {
        System.out.println("MIAU MIAU!!");
    }
    
    public void olfatear() {
        System.out.println("MMMMMM LAIN QUE WEEEEEEEEEENO!!");
    }

    public int getPatas() {
        return patas;
    }

    public void setPatas(int patas) {
        this.patas = patas;
    }

    public String getCola() {
        return cola;
    }

    public void setCola(String cola) {
        this.cola = cola;
    }

    public int getNumeroRegistro() {
        return numeroRegistro;
    }

    public void setNumeroRegistro(int numeroRegistro) {
        this.numeroRegistro = numeroRegistro;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public String getRaza() {
        return raza;
    }

    public void setRaza(String raza) {
        this.raza = raza;
    }

    public Gato(int patas, int numeroRegistro, int par2) {
        this.patas = patas;
        this.cola = cola;
        this.numeroRegistro = numeroRegistro;
    }

    public Gato(int patas, String cola, int numeroRegistro) {
        this.patas = patas;
        this.cola = cola;
        this.numeroRegistro = numeroRegistro;
    }
        @Override
    public String toString() {
        return "El gato tiene " + patas + " patas y su cola";
    }
    /**
     * Métodos get y set
     */
    
}
