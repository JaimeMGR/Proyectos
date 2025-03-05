/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author Profesor
 */
public class Domestico extends SuperMaquina implements IMaquina {
    private boolean encendido;
    
    public Domestico(String nSerie, String modelo) {
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
    public String caracteristicas() {
        return IMaquina.super.caracteristicas()
                + this.getModelo() + "\n" 
                + this.getnSerie() + "\n"
                + this.getHoras() + " horas\n"
                + "Máquina de uso doméstico";
    }
    
}
