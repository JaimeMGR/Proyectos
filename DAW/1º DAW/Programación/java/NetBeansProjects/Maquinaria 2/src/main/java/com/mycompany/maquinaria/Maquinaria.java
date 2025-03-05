/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.maquinaria;

import java.util.HashSet;
import java.util.Set;

/**
 *
 * @author Profesor
 */
public class Maquinaria {

    public static void main(String[] args) {
        Domestico d = new Domestico("123A", "Bosch 9000");
        System.out.println(d.caracteristicas());
               
        Industrial i = new Industrial("456AWMP90", "Siemens M5", 100);
        System.out.println(i.caracteristicas());
        
        SuperMaquina s = new SuperMaquina("111", "Bosch");
        s=d;
        System.out.println(s.getClass());
        System.out.println(s.getHoras());
 
    }
}
