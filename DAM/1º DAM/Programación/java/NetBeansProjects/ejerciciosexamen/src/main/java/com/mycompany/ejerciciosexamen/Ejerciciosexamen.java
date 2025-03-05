/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejerciciosexamen;

/**
 *
 * @author damci
 */
public class Ejerciciosexamen {


    static String comienzoSaludo = "Hola ";

    String nombre;

    Saludo (String nombre){

        this. nombre = nombre;

    }

    void saludar() {

        System.out.println(comienzoSaludo + nombre);

    }

    void saludar (String nombre){

        System.out.println(comienzoSaludo + nombre);

    }

    String getNombre(){

        return nombre;

    }

}



class Utilidades {

    static void saludar (String nombre){

        System.out.println(Saludo.comienzoSaludo + nombre);

    }

}