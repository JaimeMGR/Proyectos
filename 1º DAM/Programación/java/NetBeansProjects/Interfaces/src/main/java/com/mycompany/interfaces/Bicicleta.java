/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfaces;

/**
 *
 * @author damci
 */
public class Bicicleta implements Operable{
    private String ciclista;
    private int pedaleo;
    Bicicleta (String ciclista, int pedaleo){
        this.ciclista = ciclista;
        this.pedaleo = pedaleo;
    }
    public String getIdVehículo() {
    return ("Bicicleta con ID: " + ciclista);
    }
    public void acelerar(){
        pedaleo++;
    }
    public void frenar(){
        pedaleo--;
    }
    public int getVelocidad(){
        return pedaleo;
    }
    public void resumirMetodosBicicleta(){
        System.out.println("getVelocidad");
        Operable.resumirMetodosInterfaces();
    }
}