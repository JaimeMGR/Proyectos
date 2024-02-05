/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author damci
 */
public class Doméstico extends Supermaquina implements imaquina{
    private boolean encendido;
    
    public Doméstico(String nSerie, String modelo) {
        super(nSerie, modelo);
    }

    @Override
    public void encender() {
        System.out.println("Se enciende la máquina");
        encendido = true; 
    }

    @Override
    public void apagar() {
        System.out.println("Se apaga la máquina");
        encendido = false;  
    }

    @Override
    public String características() {
        return imaquina.super.características() 
                + this.getModelo() + "\n"
                + this.getnSerie() + "\n"
                + "Máquina de uso doméstico"; 
    }
    
}
