/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejercicio92;

import java.util.HashMap;
import java.util.*;

/**
 *
 * @author damci
 */
// Clase Pedido, representa un pedido realizado por un cliente
public class Pedidos {
    private String id;
    private Cliente cliente;
    private HashMap<Productos, Integer> articulos;

    public Pedidos(String id, Cliente cliente) {
        this.id = id;
        this.cliente = cliente;
        this.articulos = new HashMap<>();
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public Cliente getCliente() {
        return cliente;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public HashMap<Productos, Integer> getArticulos() {
        return articulos;
    }

    public void añadirArticulos(Productos producto, int unidades) {
        if (articulos.containsKey(producto))
            this.articulos.replace(producto, unidades, this.articulos.get(producto) + unidades);
        else this.articulos.put(producto,unidades);
    }
    
        public void borrarArticulos(Productos producto){
        if (articulos.containsKey(producto))
            articulos.remove(producto);
    }

    
    
}