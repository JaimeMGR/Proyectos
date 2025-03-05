/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.exament7;

/**
 *
 * @author damci
 */
public class ExamenT7 {

    public static void main(String[] args) {
    Lavadora lavadoraAEG = new Lavadora(7, 400, 600,"Amarillo limón", 'A', 30);
    Television tvSamsung = new Television(24, true, 190, "negro", 'P', 10);
    
        System.out.println(lavadoraAEG);
        System.out.println(tvSamsung);
    
    }
}
