/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public class EstrellaMar {
    public int brazos = 3;
    public void nadar(){
        System.out.println("Se mueve por el agua");
    };
    
    public void corte(){
    while (brazos >5 && brazos > -1)
        brazos = brazos -1;
        System.out.println("le han dado un bocado a la estrella y  le han arrancado 1 brazo, ahora tiene " + brazos + " brazos");     
    }
    public void regenerar(){
    while (brazos <5){
        System.out.println("Se regenera");
        brazos = brazos +1;
        System.out.println("Ahora vuelve a tener " + brazos + " brazos");
    }
    
    };

    public EstrellaMar(int brazos) {
        this.brazos = brazos;
    }
    
}
