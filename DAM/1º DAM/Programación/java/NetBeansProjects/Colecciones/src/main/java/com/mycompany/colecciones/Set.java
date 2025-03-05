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
public class Set {
    static void crearHashSet()
    {
        HashSet<String> setNombres = new HashSet<>();
        
        setNombres.add("Juan");
        setNombres.add("Micaela");
        setNombres.add(null);
        if (setNombres.add("Micaela"))
            System.out.println("Elemento no insertado");;
        setNombres.add("David");
        
        //Recorrer elementos
        Iterator<String> itr=setNombres.iterator();
        while(itr.hasNext()) {
            System.out.println(itr.next());
        }
        
        System.out.println(setNombres);
    }
    
    static void crearLinkedHashSet()
    {
        HashSet<String> setNombres = new HashSet<>();
        
        setNombres.add("Juan");
        setNombres.add("Micaela");
        setNombres.add(null);
        if (setNombres.add("Micaela"))
            System.out.println("Elemento no insertado");;
        setNombres.add("David");
        
        //Recorrer elementos
        Iterator<String> itr=setNombres.iterator();
        while(itr.hasNext()) {
            System.out.println(itr.next());
        }
        
        System.out.println(setNombres);
    }
    
    
}
