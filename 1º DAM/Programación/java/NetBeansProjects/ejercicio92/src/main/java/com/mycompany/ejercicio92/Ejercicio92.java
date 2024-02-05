/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ejercicio92;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

/**
 *
 * @author damci
 */
public class Ejercicio92 {

   public static void main(String[] args) {
       Productos p1 = new Productos("Tornillo 11", "estrella", "312",.1);
       Productos p2 = new Productos("Tornillo 31", "plano", "2332",.1);
       Productos p3 = new Productos("Destornillador lujo", "Mixto", "2346",4);
       Cliente c1 = new Cliente("Fabio", "Jiménez Páez", "2346G");
       Cliente c2 = new Cliente("Ana", "Pérez Jaime", "2354M");
       
       Pedidos pe1 = new Pedidos("1", c1);
       pe1.añadirArticulos(p1,100);
       pe1.añadirArticulos(p2,100);
       pe1.añadirArticulos(p1,50);
       
       Pedidos pe2 = new Pedidos("2", c1);
       pe1.añadirArticulos(p3,100);
       pe1.añadirArticulos(p1,100);
       pe1.añadirArticulos(p3,50);
       
       Cola c = new Cola();
       c.encolar(pe2);
       c.encolar(pe1);
       
       //Procesar pedidos
       Pedidos atendido = c.desencolar();
       System.out.println("Nombre del cliente del pedido en proceso: "
       + atendido.getCliente().getNombre()
       + " "
       + atendido.getCliente().getApellidos());
       
       System.out.println("Lista de productos");
       HashMap <Productos, Integer> Lista = atendido.getArticulos();
       System.out.println(atendido.getArticulos());
       
       for(Productos p:Lista.keySet())
       {
           System.out.println(p.getnSerie());
       }
       
       Lista.keySet().forEach((prod)-> {
           System.out.println(prod.getnSerie());
        });
   }    

}
