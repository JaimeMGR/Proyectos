/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.polimorfismo;

/**
 *
 * @author damci
 */
public class Perro {
    private String raza;

    public Perro(String Raza) {
        this.raza = Raza;
    }
    
    public void alimentar()
    {
        System.out.println("un perro de raza " + raza + "está comiento");
    }
}
