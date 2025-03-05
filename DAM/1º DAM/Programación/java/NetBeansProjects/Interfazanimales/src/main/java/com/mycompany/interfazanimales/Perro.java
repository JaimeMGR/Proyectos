/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public class Perro implements IAnimal{
    private String nombre;
    private int peso;
    
    @Override
    public void comer(int cantidad) {
        peso = peso + (cantidad/1000);
    }

    @Override
    public void mover(int x, int y) {
        System.out.println("El perro se mueve a " + x + ", " + y);
    }
    
 @Override
 public String informe(){
 return IAnimal.super.informe()
 + "\n"
 + "Animal: Perro\n"
 + "Nombre: " + nombre + "\n"
 + "Peso: " + peso + " gr";
 }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getPeso() {
        return peso;
    }

    public void setPeso(int peso) {
        this.peso = peso;
    }

    public Perro(String nombre, int peso) {
        this.nombre = nombre;
        this.peso = peso;
    }


}
