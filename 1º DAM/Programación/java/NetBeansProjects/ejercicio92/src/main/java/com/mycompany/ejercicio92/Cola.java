/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejercicio92;
import java.util.LinkedList;
/**
 *
 * @author damci
 */
public class Cola {
    private final LinkedList<Pedidos> cola ;

    public Cola() {
        this.cola = new LinkedList<>();
    }
    
    public void encolar(Pedidos pedido)
    {
        cola.add(pedido);
    }
    
        public Pedidos desencolar()
    {
        return cola.remove();
    }
}
