/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.colecciones;

import java.util.*;

/**
 *
 * @author damci
 */
public class Map {
    static void crearhashmap(){
        HashMap<Integer, String> hashMap = new HashMap<>();
        hashMap.put(1,"1");
        hashMap.put(3,"3");
        hashMap.put(4,"4");
        hashMap.put(2,"2");
        hashMap.put(5,"5");
        System.out.println(hashMap.values());
        System.out.println(hashMap.get(3));
    }
    
    
    static void crearTreeMap() {
        TreeMap<Integer, String> puntuaciones = new TreeMap<>();
        puntuaciones.put(8,"Notable alto");
        puntuaciones.put(5,"Aprobado");
        puntuaciones.put(10,"Matrícula de honor");
        puntuaciones.put(6,"Bien");
        puntuaciones.put(9,"Sobresaliente");
        puntuaciones.put(7,"Notable");
        
        puntuaciones.entrySet().forEach((m) -> {
            System.out.println(m.getKey() + " " + m.getValue());
        });
        
        puntuaciones.replace(7,"Notable","Notable bajo");
        System.out.println(puntuaciones.values());
    }
}