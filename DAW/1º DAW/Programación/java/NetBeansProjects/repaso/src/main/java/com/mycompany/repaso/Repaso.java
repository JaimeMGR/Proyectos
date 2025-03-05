/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.repaso;

/**
 *
 * @author damci
 */
public class Repaso {

    public static void main(String[] args) {
        ConIVA f = new ConIVA(100f, 21f, 121f);
        f.setBi(200);
        f.calcularTotal();
    }
}
