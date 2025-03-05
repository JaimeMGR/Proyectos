/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package com.mycompany.maquinaria;

/**
 *
 * @author Profesor
 */
public interface IMaquina{
    public void encender();
    public void apagar();
    default public String caracteristicas(){
        return("Ficha de la máquina\n");
    }
}
