/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.polimorfismo;

/**
 *
 * @author damci
 */
interface MedioTransporte {
    default public void getinfo(){
        System.out.println("MedioTransporte");
    }
}
class Aero implements MedioTransporte {
    public void getInfo() {System.out.println("Aereo");
}
}

