/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public class Pajaro implements IAnimal{
    private String nombre;
    private String color;
    public void volar(){
        System.out.println("Está volando");};
    private void piar(){
        System.out.println("Pio Pio");};

    public Pajaro(String nombre, String color) {
        this.nombre = nombre;
        this.color = color;
    }

    @Override
    public void mover(int x, int y) {}

    @Override
    public void comer(int cantidad) {}

    @Override
    public String informe() {
        return null;
    }
}
