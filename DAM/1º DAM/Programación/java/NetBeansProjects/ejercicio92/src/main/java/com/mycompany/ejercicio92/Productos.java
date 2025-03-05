/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejercicio92;

/**
 *
 * @author damci
 */
// Clase Producto, representa un producto que puede ser solicitado en un pedido
public class Productos {
    private String nombre;
    private String tipo; // el tipo de producto
    private String nSerie;
    private double precio;

    public Productos(String nombre, String tipo, String nSerie, double precio) {
        this.nombre = nombre;
        this.tipo = tipo;
        this.nSerie = nSerie;
        this.precio = precio;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getnSerie() {
        return nSerie;
    }

    public void setnSerie(String nSerie) {
        this.nSerie = nSerie;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

}


