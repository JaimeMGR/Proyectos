/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.examen;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author jaime
 */
public class Examen {

    public static void main(String[] args) {
        Circulo cir = new Circulo(10);
        Triangulo tri = new Triangulo(5, 3);
        Cuadrado cua = new Cuadrado(4);
        System.out.println(cir.mostrar());
        System.out.println(tri.mostrar());
        System.out.println(cua.mostrar());
        List<Figura> figuricas = new ArrayList<>();
        figuricas.add(cir);
        figuricas.add (tri);
        figuricas.add(cua);
        
    
    }            
}