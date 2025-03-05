/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.examencoleccionesclases;

/**
 *
 * @author Profesor
 */
public class ExamenColeccionesClases {

    public static void main(String[] args) {
//        Persona p = new Persona("Carmen", "López", "11111A");
//        ListaPersonas lista = new ListaPersonas();
//        
//
//        lista.añadirPersona(new Persona("Carmen", "López", "11111A"));
//        lista.listar();
//        System.out.println(lista.buscar("11111A"));
//        System.out.println(lista.buscar("11111B"));
                
        //Eletrodomésticos
        Lavadora lavadoraAEG = new Lavadora(400f, "Amarillo limón", 'Y', 30, 7);
        
        System.out.println(lavadoraAEG);
        System.out.println(lavadoraAEG.precioFinal());
        
        Television tvSamsung = new Television(190f, "negro", 'P', 10, true, 24);
        System.out.println(tvSamsung);
        System.out.println(tvSamsung.precioFinal());
    }
}
