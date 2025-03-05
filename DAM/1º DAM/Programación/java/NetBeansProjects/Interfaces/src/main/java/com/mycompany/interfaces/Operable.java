    /*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfaces;

/**
 *
 * @author damci
 */
public interface Operable {
    public String getIdVehículo ();
    public void acelerar ();
    public void frenar();
    default public void imprimirUbicacionGeografica(){
        System.out.println("Implementación por defecto en interface");
    }
    public static void resumirMetodosInterfaces(){
        System.out.println("getIdVehículo, acelerar, frenar"
        + ", imprimirUbicacionGeografica, resumirMetodosInterface");
    }
}
