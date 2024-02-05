/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.iterador;

import java.util.ArrayList;
import java.util.*;
import java.util.ArrayList;
import static java.util.Collections.list;

/**
 *
 * @author damci
 */
public class Iterador {



    static ArrayList<String> frutas = new ArrayList<>();
    
    public static void main(String[] args) {
    
        frutas.add("manzana");
        frutas.add("kiwi");
        frutas.add("pera");
        frutas.add("plátano");
        frutas.add("coco");

    for(int i=0;i<frutas.size();i++)
    {
        System.out.println(frutas.get(i));
    }
        
    System.out.println("");
        
    for (String fruta : frutas) 
    {
      System.out.println(fruta);
    }
    
    System.out.println("");
    
    frutas.forEach((f) -> {
        System.out.println(f); 
    });
    
    System.out.println("");
    
    frutas.forEach(System.out::println);
    
    System.out.println("");
    
    Iterator<String> iterator = frutas.iterator();
    while (iterator.hasNext()) {
        System.out.println(iterator.next());
    }
    
    iterator.forEachRemaining(ff -> {;
    System.out.println(iterator.next());
    });
    
    
    
    //Iterador inverso
    ListIterator iteradorInverso = frutas.listIterator(frutas.size());
    while (iteradorInverso.hasPrevious()){
        System.out.println(iteradorInverso.previous());
    }
        
    System.out.println("");
    //Iterar al revés invirtiendo lista
    Collections.reverse(frutas);
        
    System.out.println("");
    //Iterar al revés
    Collections.reverse(frutas);
    
    Iterator<String> iterator2 = frutas.iterator();
    while (iterator2.hasNext()) {
        System.out.println(iterator2.next());
    }    
    System.out.println("");
    iterator.forEachRemaining(ff -> {;
    System.out.println(iterator.next());
    });
    
    }
}

