/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.abstracto;

/**
 *
 * @author damci
 */
public class Ave extends Animal {
    private int patas;
    private int alas;
    
    @Override
    public void comunicarse() {
        //TODO Auto-generated method stub
    }
    
    public void hacerNido(){
        System.out.println("Haciendo un nido to guapo");
        //Implementamos la funcion para hacer un nido
    }

    public int getPatas() {
        return patas;
    }

    public void setPatas(int patas) {
        this.patas = patas;
    }

    public int getAlas() {
        return alas;
    }

    public void setAlas(int alas) {
        this.alas = alas;
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

    public Ave(int patas, int alas, int par2) {
        this.patas = patas;
        this.alas = alas;
    }

    @Override
    public String toString() {
        return "El pájaro tiene " + patas + " patas y " + alas + "alas";
    }
    
    /**
     * Métodos Get y Set
     */
    
}
