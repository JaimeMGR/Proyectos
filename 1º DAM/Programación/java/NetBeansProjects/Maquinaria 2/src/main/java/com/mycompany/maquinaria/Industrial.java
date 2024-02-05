/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author Profesor
 */
public class Industrial extends SuperMaquina implements IMaquina {
    private int consumo;
    private boolean armado;

    public Industrial(String nSerie, String modelo, int consumo) {
        super(nSerie, modelo);
        this.consumo = consumo;
    }

    
    
    public int getConsumo() {
        return consumo;
    }

    public void setConsumo(int consumo) {
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
    public String caracteristicas() {
        return IMaquina.super.caracteristicas()
        + this.getModelo() + "\n" 
        + this.getnSerie() + "\n"
        + this.getConsumo() + " Kw\n"                
        + this.getHoras() + " horas\n"
        + "Máquina industrial";
    }
    
}
