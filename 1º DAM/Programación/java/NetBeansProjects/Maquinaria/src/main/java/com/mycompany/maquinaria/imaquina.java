/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author damci
 */
public interface imaquina {
    public void encender();
    public void apagar();
    default public String características(){
        return("Ficha de la máquina\n");
    }
}
