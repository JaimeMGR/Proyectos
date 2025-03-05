/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.exament62;

/**
 *
 * @author damci
 */
public class ExamenT62 {

    public static void main(String[] args) {
        Electrodomestico ele = new Electrodomestico(400f, "Amarillo Limon", 'Y',30);
        Lavadora lavadoraAEG = new Lavadora(400f, "Amarillo Limon", 'Y',30, 7);
        Television tvSamsung = new Television(190f, "Negro", 'P',10, 24, true);
        
        
        System.out.println(ele);
        System.out.println(ele.precioFinal());
        System.out.println("------------------------------------------------------------------------");
        System.out.println(lavadoraAEG);
        System.out.println(lavadoraAEG.precioFinal());
        System.out.println("------------------------------------------------------------------------");
        System.out.println(tvSamsung);
        System.out.println(tvSamsung.precioFinal());
    }
}
