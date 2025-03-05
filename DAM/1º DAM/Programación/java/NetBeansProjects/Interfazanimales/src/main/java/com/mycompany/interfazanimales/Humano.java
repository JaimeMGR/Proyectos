/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public class Humano implements IAnimal, IEvolucion {
    String nombre;
    
    public void hacerFuego()
    {
        System.out.println("Haciendo fuego");
    }

    @Override
    public void mover(int x, int y) {
        throw new UnsupportedOperationException("Not supported yet.");
    }

    @Override
    public void comer(int cantidad) {
        throw new UnsupportedOperationException("Not supported yet.");
    }

    @Override
    public void hablar() {
        System.out.println("Buenas");
    }

    @Override
    public void pensar() {
        System.out.println("Estoy pensando");
    }

    @Override
    public void crearHerramienta() {
        System.out.println("Crea una herramienta");
    }
    
    
}
