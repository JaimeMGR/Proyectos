/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author Profesor
 */
public class SuperMaquina {
    private String nSerie;
    private String modelo;
    private int horas;

    public SuperMaquina(String nSerie, String modelo) {
        this.nSerie = nSerie;
        this.modelo = modelo;
        horas = 12;
    }

    
    
    public String getnSerie() {
        return nSerie;
    }

    public void setnSerie(String nSerie) {
        this.nSerie = nSerie;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    public int getHoras() {
        return horas;
    }

    public void setHoras(int horas) {
        this.horas = horas;
    }


    
    
}
