/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public class Mono implements IAnimal, IEvolucion {

    @Override
    public void mover(int x, int y) {
    }

    @Override
    public void comer(int cantidad) {
    }

    @Override
    public String informe() {
        return IAnimal.super.informe()
                + "\n"
                + "Animal: mono\n";
    }

    @Override
    public void hablar() {
        System.out.println("UH UH AH AH AH AH");
    }

    @Override
    public void pensar() {
        System.out.println("El mono está pensando");
    }

    @Override
    public void crearHerramienta() {
        System.out.println("el mono pincha un palo en un mojón");
    }
}
