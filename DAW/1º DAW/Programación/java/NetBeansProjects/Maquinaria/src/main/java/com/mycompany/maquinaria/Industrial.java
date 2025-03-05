/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author damci
 */
public class Industrial extends Supermaquina implements imaquina {
    public int consumo;
    private boolean armado;
    private String getConsumo;
    
    public Industrial(String nSerie, String modelo, int consumo) {
        super(nSerie, modelo);
        this.consumo = consumo;
    }
    
    
    @Override
    public void encender() {
        System.out.println("Armando sistema");
        armado = true;
    }

    @Override
    public void apagar() {
    System.out.println("Apagado seguro del sistema");
    armado = false;
    }

    
    @Override
    public String características() {
        return imaquina.super.características()
                + this.getModelo() + "\n"
                + this.getnSerie() + "\n"
                + this.getConsumo + "vatios\n"
                + this.getHoras() + "horas\n"
                + "Máquina de uso doméstico";
    }


    
}
