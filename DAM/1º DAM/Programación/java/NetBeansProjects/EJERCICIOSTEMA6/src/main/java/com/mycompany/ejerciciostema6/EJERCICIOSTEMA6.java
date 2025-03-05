/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejerciciostema6;
import com.mycompany.ejerciciostema6.viajero.persona.Viajero;
import java.util.Random;
/**
 *
 * @author damci
 */
public class EJERCICIOSTEMA6 {

    public static void main(String[] args) {
        Random numeroaleatorio = new Random();
        int primernumero = numeroaleatorio.nextInt(0,10) +1;
        int segundonumero = numeroaleatorio.nextInt(0, 10) +1;
        System.out.println("Numero 1: " + primernumero);
        System.out.println("Numero 2: " + segundonumero);
        System.out.println("El mayor es: " + Math.max(primernumero, segundonumero));
        
        Viajero v1 = new Viajero();
        Viajero v2 = new Viajero("12345G", "Carlos", "López", "Española", "GR");
        Viajero v3 = new Viajero();
        System.out.println("Número de instancias: " + Viajero.nInstancias);
        v1.getInfo("pausado");
        v2.getInfo("normal");
        
    }
}