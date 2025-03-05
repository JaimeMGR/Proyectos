/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.maquinaria;

/**
 *
 * @author damci
 */
public class Maquinaria {

    public static void main(String[] args) {
        Doméstico d = new Doméstico("123A", "Bosh 9000");
        System.out.println(d.características());
        
        Industrial i = new Industrial ("465AWMP90", "Siemens M5", 100);
        System.out.println(i.características());
        
        Supermaquina s = new Supermaquina("111", "Bosch");
        s=d;
        System.out.println(s.getClass());
        System.out.println(s.getHoras() + " horas de uso");
    }
}
