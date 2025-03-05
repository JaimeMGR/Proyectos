/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.polimorfismo;

/**
 *
 * @author damci
 */
public class Mascota extends Perro{
    private String nombre;

    public Mascota(String raza, String nombre) {
        super(raza);
        this.nombre = nombre;
    }

    @Override
    public void alimentar() {
        System.out.println("la mascota " + nombre + " está comiendo potaje");
    }
    
    
}
