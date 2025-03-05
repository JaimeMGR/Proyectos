/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfaces;

/**
 *
 * @author damci
 */
public class Tren implements Operable {
    private String id;
    private int velocidad;
    Tren (String id, int velocidad){
        this.id = id;
        this.velocidad = velocidad;
    }
    public String getIdVehículo() {
        return ("Tren con ID: " + id);
    }
    public void acelerar(){
        velocidad++;
    }
    public void frenar(){
        velocidad--;
    }
    public int getVelocidad(){
        return velocidad;
    }
    public void resumirMetodosTren(){
        System.out.println("getVelocidad");
        Operable.resumirMetodosInterfaces();
    }
}